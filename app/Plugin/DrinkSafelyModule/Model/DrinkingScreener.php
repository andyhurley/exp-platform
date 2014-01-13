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
 * fiveadayScreener Model
 *
 * @property User $User
 */
class DrinkingScreener extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'drinking_screeners';


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
			'how_often' => array(
					'valid' => array(
							'rule' => array('range', -1, 5),
							'message' => 'Please enter how often you have a drink containing alcohol.',
					)
			),
			'how_many' => array(
					'valid' => array(
						'rule'    => array('range', -1, 5),
						'message' => 'Please enter how many units of alcohol you drink on a typical drinking day.',
					)
			)
			,'binge' => array(
					'valid' => array(
							'rule' => array('range', -1, 5),
							'message' => 'Please enter how many days you had more than the recommended number of units.',
					)
			)
	);
	
	public function calculateScore() 
	{
		$howoften = $this->data['DrinkingScreener']['how_often'];
		$howmany = $this->data['DrinkingScreener']['how_many'];
		$binge = $this->data['DrinkingScreener']['binge'];
		$score = $howoften + $howmany + $binge; 
		
		return $score;
	}
}
?>