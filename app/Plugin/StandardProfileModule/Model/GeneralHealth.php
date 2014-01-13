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
App::uses('StandardProfileModuleAppModel', 'StandardProfileModule.Model');
/**
 * GeneralHealth Model
 *
 * @property User $User
 */
class GeneralHealth extends StandardProfileModuleAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'profile_general_health';


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
			'general_health' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => 'You must record a health score',
					'allowEmpty' => true,
					'required' => false
				),
				'range' => array(
					'rule' => array('range', -1, 6),
					'message' => 'Please select a valid option'
				),
			),
			'sickness_absence' => array(
				'numeric' => array(
						'rule' => array('numeric'),
						'message' => 'Please record the number of days off work for health reasons',
						'allowEmpty' => true,
						'required' => false
				),
				'range' => array(
						'rule' => array('range', -1, 184),
						'message' => 'Please record the number of days off work for health reasons (between 0 and 183 days)'
				),
			),
			'sickness_absence_spells' => array(
				'numeric' => array(
						'rule' => array('numeric'),
						'message' => 'Please record the number of spells of sickness absence',
						'allowEmpty' => true,
						'required' => false
				),
				'range' => array(
						'rule' => array('range', -1, 27),
						'message' => 'Please record the number of spells of sickness absence (between 0 and 26)'
				),
			),
			'work_performance' => array(
				'numeric' => array(
						'rule' => array('numeric'),
						'message' => 'Please rate your work performance',
						'allowEmpty' => true,
						'required' => false
				),
				'range' => array(
						'rule' => array('range', -1, 11),
						'message' => 'Please rate your work performance (between 0 and 10)'
				),
			),
	);
}
