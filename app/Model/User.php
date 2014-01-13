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
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeEmail', 'Network/Email');

class User extends AppModel {
	public $hasOne = array(
		'Profile' => array(
			'className' => 'StandardProfileModule.Profile'
		)
	);
	public $hasMany = array('ModuleUser');
	
	public $validate = array(
			'email' => array(
					'email',
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'An email address is required'
					),
					'isUnique' => array(
							'rule'    => 'isUnique',
							'message' => 'This email address is already registered'
					)
			),
			'password' => array(
					'required' => array(
							'rule' => array('notEmpty'),
							'message' => 'A password is required'
					)
			),
			'role' => array(
					'valid' => array(
							'rule' => array('inList', array('super-admin', 'admin', 'user')),
							'message' => 'Please select a valid user-role',
							'allowEmpty' => false
					)
			)
	);
	
	public function beforeSave($options = array()) {
		parent::beforeSave($options);
		
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
	
	/**
	 * The module identified by $moduleID is added to the user's dashboard, at the next available dashboard position.
	 * If the module is already on the user's dashboard, then nothing is updated and false is returned.
	 * @param int $id the user id
	 * @param int $moduleId the module id
	 * @param int $position the dashboard position (or next available position, if left null)
	 * @return boolean true if successful, false otherwise
	 */
	public function addModule($id, $moduleId, $position = null) {
		if($this->ModuleUser->alreadyOnDashboard($id, $moduleId)) {
			return false;
		}
		
		if(is_null($position)) {
			$position = $this->ModuleUser->getNextPosition($id);
		}
		$this->ModuleUser->save(array(
			'user_id' => $id,
			'module_id'=> $moduleId,
			'position' => $position
		));
		return true;
	}
	
	/**
	 * Returns the total number of admin users registered on the website (including super admin)
	 * 
	 * @param int $user_id
	 */
	public function totalAdminUsers() {
		//$total = $this->find('all', array('conditions'=>array('OR'=>array('role'=>array('super-admin','admin')))));

		$total = $this->find('count', array(
				'conditions'=>array('OR'=>array('role'=>array('super-admin','admin')))
		));
		return $total;
	}
	
	/**
	 * Generate and Set New Random Password. 
	 * Returns new password
	 * 
	 * @param varchar $email
	 */
	public function setRandomPassword() 
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789@&*^%!?";
    	$pass = array(); //remember to declare $pass as an array
    	$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    	
		for ($i = 0; $i < 8; $i++) {
        	$n = rand(0, $alphaLength);
       		$pass[] = $alphabet[$n];
   		}
   		
		$newpassword = implode($pass); //turn the array into a string
		$this->set(array('password' => $newpassword));			
		$this->save();
		return $newpassword;
	}
}
?>