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
App::uses('ExampleModuleAppModel', 'ExampleModule.Model');
/**
 * SimpleHealthTestWeekly Model
 *
 * @property User $User
 */
class SimpleHealthTestWeekly extends ExampleModuleAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'simple_health_test_weekly';

/**
 * Validation rules
 *
 * @var array
 */
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
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tuesday' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'wednesday' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'thursday' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'friday' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'saturday' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'sunday' => array(
			'numeric' => array(
				'rule' => array('range', -1, 11),
				'message' => 'Please enter a number between 0 and 10',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'total' => array(
			'numeric' => array(
				'rule' => array('range', -1, 71),
				'message' => 'The total should be a number between 0 and 70',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
	
	/**
	 * Calculates the "total health score" for this weekly record, by totalling up each of the individual
	 * daily scores.
	 * 
	 * @return number
	 */
	public function calculateTotal() {
		$total = $this->data['SimpleHealthTestWeekly']['monday']
				+ $this->data['SimpleHealthTestWeekly']['tuesday']
				+ $this->data['SimpleHealthTestWeekly']['wednesday']
				+ $this->data['SimpleHealthTestWeekly']['thursday']
				+ $this->data['SimpleHealthTestWeekly']['friday']
				+ $this->data['SimpleHealthTestWeekly']['saturday']
				+ $this->data['SimpleHealthTestWeekly']['sunday'];

		if(!is_numeric($total)) $total = 0;
		
		return $total;
	}
}
