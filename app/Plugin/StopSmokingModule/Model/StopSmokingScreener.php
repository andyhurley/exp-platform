<?php 
/**
 * Copyright (c) 2013 It's All Nice <http://itsallnice.co.uk/>
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
/**
 * StopSmokingScreener Model
 *
 * @property User $User
 */
class StopSmokingScreener extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'stop_smoking_screeners';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
	
	public $validate = array(
			'smokes' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('Y', 'N')),
             		'message' => 'Please select either Y or N.'
         		)
     		),
			'how_many' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('0', '1', '2', '3')),
             		'message' => 'Please enter how many cigarettes per day you smoke.'
         		)
     		),
			'first_cig' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('1', '2', '3')),
             		'message' => 'Please enter how soon you smoke your first cigarette.'
         		)
     		),
			'diff_non_smoking' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('0', '1')),
             		'message' => 'Please state whether you find it difficult to stop smoking in non-smoking areas.'
         		)
     		),
			'most_hate' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('0', '1')),
             		'message' => 'Please choose which cigarette you would most hate to give up.'
         		)
     		),
			'more_morning' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('0', '1')),
             		'message' => 'Please state whether you smoke more frequently just after waking up.'
         		)
     		),
			'smoke_in_bed' => array(
         		'allowedChoice' => array(
             		'rule'    => array('inList', array('0', '1')),
             		'message' => 'Please state whether you smoke when ill in bed.'
         		)
     		)
	);
	
	public function calculateScore() 
	{
		$how_many = $this->data['StopSmokingScreener']['how_many'];
		$first_cig = $this->data['StopSmokingScreener']['first_cig'];
		$diff_not_smoking = $this->data['StopSmokingScreener']['diff_non_smoking'];
		$most_hate = $this->data['StopSmokingScreener']['most_hate'];
		$more_morning = $this->data['StopSmokingScreener']['more_morning'];
		$smoke_in_bed = $this->data['StopSmokingScreener']['smoke_in_bed'];
		$score = $how_many + $first_cig + $diff_not_smoking + $most_hate + $more_morning + $smoke_in_bed;
		
		return $score;
	}
}

?>