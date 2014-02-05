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
App::uses('AppController', 'Controller');
/**
 * Admin Panel Controller
 */
class AdminPanelController extends AppController {
	
	/**
 	* index method. Load information required for the admin panel.
 	*
 	* @return void
 	*/
	public function index() {
		$this->redirectIfNotAdmin();
		
		// Load the required Models
		$this->loadModel('User');
		$this->loadModel('News');
		$this->loadModel('Module');
		$this->loadModel('ModuleUser');
		
		// Load the numbers of users
		$totalUsers = $this->User->find('count');
		$totalAdminUsers = $this->User->totalAdminUsers();
		$this->set('totalUsers', $totalUsers);
		$this->set('totalAdminUsers', $totalAdminUsers);
	
		// Retrieve the list of active modules
		$activeModules = $this->Module->findAllByTypeAndActive('dashboard',1);
		$totalModuleInstances = $this->ModuleUser->find('count');
		$this->set('activeModules', $activeModules);
		$this->set('totalModuleInstances', $totalModuleInstances);
		
		// Retrieve the total number of data records
		$totalDataRecords = 0;
		foreach ($activeModules as $module) {
			$totalDataRecords = $totalDataRecords + $this->requestAction($module['Module']['base_url'].'/total_data_records');
		}
		$this->set('totalDataRecords', $totalDataRecords);
		
		// Load News Information
		$totalNews = $this->News->find('count');
		$latestNews = $this->News->getLatestNews();
		$this->set('totalNews', $totalNews);
		$this->set('latestNews', $latestNews);
		
		$this->set('title_for_layout', 'Admin Panel'); 
	}
	
	/**
 	* Finds the "admin_module_data" function from the module and displays it
 	* @param unknown $moduleId
 	* @return void
	* If module not found throws not found exception.
 	*/
	public function health_data($moduleId = null) {
		$this->redirectIfNotAdmin();
		
		// Load the Module
		$this->loadModel('Module');
		$module = $this->Module->findById($moduleId);
		
		if(empty($module)) {
			throw new NotFoundException("The module with id ".$moduleId." was not found");
		}
		$this->set('module', $module);
	}
}
?>