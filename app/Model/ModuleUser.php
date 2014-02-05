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
class ModuleUser extends AppModel
{
	public $belongsTo = array(
			'User', 'Module'
	);
	
	/**
	 * Returns a list of all the modules associated with the given user.
	 * @param int $userId
	 */
	public function getModuleList($userId) {
		$options = array('conditions' => array('user_id' => $userId));
		return $this->find('all', $options);
	}
	
	/**
	 * Returns the next available position on the dashboard.
	 * @param int $userId
	 */
	public function getNextPosition($userId) {
		$options = array('conditions' => array('user_id' => $userId), 'order' => array('position' => 'desc'));
		$last = $this->find('first', $options);
		
		if(empty($last)) return 1;
		
		return $last['ModuleUser']['position'] + 1;
	}
	
	/**
	 * Returns true if the given module id is already linked to the given user's dashboard.
	 * @param unknown $userID
	 * @param unknown $moduleID
	 */
	public function alreadyOnDashboard($userId, $moduleId) {
		$options = array('conditions' => array('user_id' => $userId, 'module_id' => $moduleId));
		$moduleexists = $this->find('first', $options);
		return !empty($moduleexists);
	}
}