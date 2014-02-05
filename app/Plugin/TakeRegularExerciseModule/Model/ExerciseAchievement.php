<?php
/**
 * Copyright (c) 2014 It's All Nice <http://itsallnice.co.uk/>
 *
 * This file is part of the Experimental Platform for Health Promotion.
 *
 * The Experimental Platform for Health Promotion is free software:
 * you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation,
 * either version 3 of the License, or (at your option) any later version.
 *
 * The Experimental Platform for Health Promotion is distributed in the
 * hope that it will be useful, but WITHOUT ANY WARRANTY; without even
 * the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with the Experimental Platform for Health Promotion. If not,
 * see <http://www.gnu.org/licenses/>.
 *
 * @copyright     Copyright (c) It's All Nice (http://itsallnice.co.uk/)
 * @license       GPL v3 License (http://opensource.org/licenses/GPL-3.0)
 */
App::uses('AppModel', 'Model');
App::uses('ModuleHelper', 'Lib');
/**
 * ExerciseAchievement Model
 *
 */
class ExerciseAchievement extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'user_id';
	public $useTable = 'exercise_achievements';
	
	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

	public $hasMany = array(
			'ExerciseWeekly' => array(
					'className' => 'TakeRegularExerciseModule.ExerciseWeekly',
					'foreignKey' => 'user_id'
			)
	);
	
	/**
	 * Variable to indicate what a 'healthy day' score should be. Any daily score over this number
	 * counts as a 'healthy day' for this example module.
	 */
	private $healthyScore = 21;
	private $healthyWeekScore = 150;

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'healthy_days_last_week' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_days_healthy' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total_full_weeks_healthy' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'consec_healthy_weeks' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	/**
	 * Updates all of the achievement records for the given user (but does not save to database).
	 * NB - calling this function also sets the user_id of this instance of the model.
	 * 
	 * @param int $user_id
	 */
	public function updateAchievements($user_id) {
		$bestWeekSoFar = $this->bestWeekSoFar($user_id);
		$totalMinutes = $this->totalMinutes($user_id);
		$healthyWeeks = $this->totalHealthyWeeks($user_id);
		$totalConsecWeeks = ModuleHelper::totalWeeksHealthyConsec($this->ExerciseWeekly, $user_id, $this->healthyWeekScore);
		
		$this->set('user_id', $user_id);
		$this->set('best_week_so_far', $bestWeekSoFar);
		$this->set('total_minutes', $totalMinutes);
		$this->set('total_full_weeks_healthy', $healthyWeeks);
		$this->set('consec_healthy_weeks', $totalConsecWeeks);
	}
	
	/**
	 * Returns the total number of healthy weeks recorded, where the given user has recorded a 'feeling healthy' score
	 * every single day.
	 * 
	 * @param int $user_id
	 */
	private function totalHealthyWeeks($user_id) {
		$total = $this->ExerciseWeekly->find('count', array(
				'conditions' => array(
						'user_id' => $user_id,
						'total >=' => $this->healthyWeekScore
				)));
		return $total;
	}
	
	/**
	 * Returns the total number of days  where the given user has recorded a 'feeling healthy' score.
	 * 
	 * @param int $user_id
	 * @return number
	 */
	private function totalDaysHealthy($user_id) {
		$containHealthyDays = $this->query("SELECT monday, tuesday, wednesday, thursday, friday, saturday, sunday FROM `exercise_weekly` WHERE user_id = " . $user_id
				. " AND ("
				. " monday >= " . $this->healthyScore
				. " OR tuesday >= " . $this->healthyScore
				. " OR wednesday >= " . $this->healthyScore
				. " OR thursday >= " . $this->healthyScore
				. " OR friday >= " . $this->healthyScore
				. " OR saturday >= " . $this->healthyScore
				. " OR sunday >= " . $this->healthyScore
				. ");"
				);
		
		if(empty($containHealthyDays)) return 0;
		
		$total = 0;
		foreach($containHealthyDays as $week) {
			foreach($week['exercise_weekly'] as $day) {
				if ($day >= $this->healthyScore) {
					$total++;
				}
			}
		}
		return $total;
	}
	
	/**
	* Returns the number of healthy minutes so far
	*
	**/
	private function totalMinutes($user_id) {
		$healthyWeeks = $this->query("SELECT `total` FROM `exercise_weekly` WHERE user_id = " . $user_id . " ORDER BY `week_beginning` ASC");
		if(empty($healthyWeeks)) return 0;
	
		$total = 0;

		foreach($healthyWeeks as $week) 
		{
			$thisweek = $week['exercise_weekly'];
			$total = $total + $thisweek['total'];
		}
		
		return $total; // number of minutes so far.
	}
	
	/**
	* Returns the number of healthy minutes so far
	*
	**/
	private function bestWeekSoFar($user_id) {
		$healthyWeeks = $this->query("SELECT `total`,`week_beginning` FROM `exercise_weekly` WHERE user_id = " . $user_id . " ORDER BY `week_beginning` ASC");
		
		if(empty($healthyWeeks)) return 0;
	
		$bestweek = gmdate("U");
		$besttotal = 0;
		
		foreach($healthyWeeks as $week) 
		{
			$thisweek = $week['exercise_weekly'];
			$thistotal = $thisweek['total'];
			
			if ($thistotal > $besttotal){
				$besttotal = $thistotal;
				$bestweek = $thisweek['week_beginning'];
			}
		}
		
		return $bestweek; // number of minutes so far.
	}
	

	public function getMedal() {
		$consecHealthyWeeks = $this->data['ExerciseAchievement']['consec_healthy_weeks'];
		if ($consecHealthyWeeks >= 8){
			return "Gold";
		}
		elseif ($consecHealthyWeeks >= 4){
			return "Silver";
		}
		elseif ($consecHealthyWeeks >= 2){
			return "Bronze";
		}
		else
		{
			return;
		}
	}
}
?>