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
App::uses('CakeTime', 'Utility');
/**
 * Profile Model
 *
 * @property User $User
 */
class Profile extends StandardProfileModuleAppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'profile';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


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
			'name' => array(
					'rule' => 'notEmpty',
					'message' => 'Please enter the name you wish to be known by'
			),
			'height_cm' => array(
					'rule' => 'numeric',
					'message' => 'Please enter your height in cm'
			),
			'mobile_no' => array(
					'rule' => array('phone','/^([0-9]{11})$/','gb'),
					'message' => 'Please enter a valid mobile number (eleven digits, no spaces), or leave blank. All UK mobile phones begin with \'07\'. Please omit the international phone code (+44)',
					'allowEmpty' => false
			),
			'post_code' => array(
					'rule' => array('postal',null,'uk'),
					'message' => 'Please enter a valid UK post code.',
					'allowEmpty' => false
			),
			'date_of_birth' => array(
				'date' => array(
					'rule' => 'date',
					'message' => 'Please enter your date of birth'
			),
				'daterange' => array(
					'rule' => 'ninetyYearsRule',
					'message' => 'The date of birth has to be within the last 90 years'
				),
				'daterange2' => array(
					'rule' => 'eighteenYearsRule',
					'message' => 'You have to be over 18 to use this website'
				) 
			),
			'gender' => array(
					'valid' => array(
							'rule' => array('inList', array('M', 'F')),
							'message' => 'Please select your gender',
							'allowEmpty' => false
					)
			),
			'allow_research' => array(
					'rule'    => array('boolean'),
					'message' => 'Incorrect value for research approval'
			)
	);
	
	public function ninetyYearsRule($myfield){
		
		$dob = $this->data['Profile']['date_of_birth']; 
		list($year,$month,$day) = explode('-',$dob,3);
		$date = mktime(0,0,0,$month,$day,$year);
	
		$olddate = mktime(0,0,0,date("m"),date("d"),date("Y")-90);
	
		return $date > $olddate;
	}
	
	public function eighteenYearsRule($myfield){
		
		// get the selected date of birth
		$dob = $this->data['Profile']['date_of_birth']; 
		list($year,$month,$day) = explode('-',$dob,3);
		$date = mktime(0,0,0,$month,$day,$year);
		
		// Get the cut off date for 18 year olds
		$youngdate = mktime(0,0,0,date("m"),date("d"),date("Y")-18);
		
		return $date < $youngdate;
		
	}
}
