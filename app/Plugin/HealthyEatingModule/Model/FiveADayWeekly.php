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
/**
 * fiveadayScreener Model
 *
 * @property User $User
 */
class FiveADayWeekly extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'fiveaday_weekly';


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
			'week_beginning' => array(
					'date' => array(
							'rule' => array('date','ymd'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => true,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'user_id' => array(
					'numeric' => array(
							'rule' => array('numeric'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => true,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			'monday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Monday',
							'allowEmpty' => true,
					)
			),
			'tuesday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Tuesday',
							'allowEmpty' => true,
					)
			),
			'wednesday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Wednesday',
							'allowEmpty' => true,
					)
			),
			'thursday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Thursday',
							'allowEmpty' => true,
					)
			),
			'friday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Friday',
							'allowEmpty' => true,
					)
			)
			,'saturday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Saturday',
							'allowEmpty' => true,
					)
			)
			,'sunday' => array(
					'valid' => array(
							'rule' => array('range', -1, 11),
							'message' => 'Please enter a number between 0 and 10 for the fruit or veg eaten on Sunday',
							'allowEmpty' => true,
					)
			)
			,'total' => array(
					'valid' => array(
							'rule' => array('range', -1, 71),
							'message' => 'Something has gone wrong. The total should be between 0 and 70.',
					)
			)
		);

	public function calculateTotal() {
		$total = $this->data['FiveADayWeekly']['monday']
		+ $this->data['FiveADayWeekly']['tuesday']
		+ $this->data['FiveADayWeekly']['wednesday']
		+ $this->data['FiveADayWeekly']['thursday']
		+ $this->data['FiveADayWeekly']['friday']
		+ $this->data['FiveADayWeekly']['saturday']
		+ $this->data['FiveADayWeekly']['sunday'];
	
		if(!is_numeric($total)) $total = 0;
	
		return $total;
	}
}
?>