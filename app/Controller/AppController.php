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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	// Load the Menu Builder Plugin
	var $helpers = array(
			'MenuBuilder.MenuBuilder' => array(
				'authField' => 'role',
				'childrenClass' => 'dropdown',
				'noLinkFormat' => '<a href="#" class="dropdown-toggle" data-toggle="dropdown">%s <b class="caret"></b></a>'
			),
			'Session' => array('className' => 'BootstrapSession'),
			'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
			'Form' => array('className' => 'BootstrapForm'),
			'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
			'Facebook.Facebook',
		);
	
	// Set the Site Name
	var $siteName = "Experimental Platform for Health Promotion";
	
	// Set commonly used components
	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array('plugin' => false, 'controller' => 'users', 'action' => 'dashboard'),
					'logoutRedirect' => array('plugin' => false, 'controller' => 'pages', 'action' => 'display', 'home'),
					'authError' => 'You&rsquo;ll need to login or register to continue',
					'authenticate' => array(
							'Form' => array(
									'fields' => array('username'=>'email')))
			),
			'Openid' => array(
					'use_database' => false,
					'accept_google_apps' => true),
			'Facebook.Connect' => array(
					'model' => 'User')
	);
	
	/**
 	* beforeFilter method
 	*
 	* @return void
 	*/
	public function beforeFilter() {
		parent::beforeFilter();
		
		// Prevent browser caching of any pages - which will help to prevent the back button from causing
		// data integrity issues.
		$this->disableCache();
		
		// Allow access to index, view, register and log out
		$this->Auth->allow('index', 'view', 'register', 'logout');
		
		$user = $this->Auth->user();
		
		// Redirect to profile record if the user does not have a valid profile saved
		$controller = $this->request['controller'];
		if(($user != null && (!isset($user['Profile']) || $user['Profile']['user_id'] == null))
				&& $controller != 'profile'
				&& $controller != 'users'
				&& $controller != 'motivation'
				&& $controller != 'modules'
				&& $controller != 'pages'
				){
			$this->Session->setFlash(__('You must complete and save your profile before proceeding'));
			$this->redirect(array('plugin' => 'standard_profile_module', 'controller' => 'profile', 'action'=>'addProfile'));
		}
			
		// Workaround, because menu-builder doesn't seem to like the automatic structure of our User model
		// Could be that we're doing the authentication bit wrong, but this temporary fix can stand for now...
		$user['User']['role'] = $user['role'];
		$this->set(compact('user'));
		
		// Define the main and footer menus - only needs to be done the once, not when requestAction calls are processed.		
		if (empty($this->request->params['requested'])) {
			$menu = array(
					'main-menu' => array(
							array(
									'title' => 'Home',
									'url' => '/',
							),
							'explore-menu' => array(
									'title' => 'Explore Modules',
							),
							'dashboard-menu' => array(
									'title' => 'My Dashboard',
									'permissions' => array('user','admin','super-admin'),
							),
							array(
									'title' => 'Admin Panel',
	                    			'permissions' => array('admin','super-admin'),
									'children' => array(
											array (
													'title' => 'View Admin Panel',
													'url' => '/admin_panel',
	                    							'permissions' => array('admin','super-admin'),
											),
											array (
													'separator' => '<li class="divider"></li>'),
											array(
												'title' => 'Users',
												'url' => array('plugin' => false, 'controller' => 'users', 'action' => 'index', 'admin' => 'true'),
												'permissions' => array('admin','super-admin'),
											),
											array(
												'title' => 'Modules / Health Data',
												'url' => array('plugin' => false, 'controller' => 'modules', 'action' => 'index', 'admin' => 'true'),
												'permissions' => array('admin','super-admin'),
											),
											array(
												'title' => 'News',
												'url' => array('plugin' => false, 'controller' => 'news', 'action' => 'index', 'admin' => 'true'),
												'permissions' => array('admin','super-admin'),
											),
									),
							),
					),
					'right-main-menu' => array(
							array(
									'title' => 'Log Out',
									'url' => '/users/logout',
	                    			'permissions' => array('user','admin','super-admin'),
							),
							// Only non-logged in users can see this
	               		 	array(
	                    			'title' => 'Login',
	                    			'url' => array('plugin' => false, 'controller' => 'users', 'action' => 'login'),
	                    			'permissions' => array(''),
	                		),
							array(
									'title' => 'Register',
									'url' => array('plugin' => false, 'controller' => 'users', 'action' => 'register'),
									'permissions' => array(''),
							),
					),
					'footer-menu' => array(
							array(
									'title' => 'Accessibility',
									'url' => '/pages/accessibility',
									'class' => 'navbar-link'
							),
							array(
									'title' => 'Terms of Use',
									'url' => '/pages/terms_of_use',
							),
							array(
									'title' => 'Privacy Statement',
									'url' => '/pages/privacy_statement',
							),
							array(
									'title' => 'Back to Top',
									'url' => '#top',
							),
					),
			);
			
			// Populate the Explore Modules menu
			$this->loadModel('Modules');
			$modules = $this->Modules->findAllByTypeAndActive('dashboard','1');
			$children = array(
				array (
					'title' => 'Available Health Modules',
					'url' => '/pages/explore_modules'
				),
				array (
						'separator' => '<li class="divider"></li>'));
			foreach ($modules as $module):
				$children[] = array('title'=>$module['Modules']['name'],'url'=>'/' . $module['Modules']['base_url'] . '/explore_module');
			endforeach;
			
			if (count($children) != 0){
				$menu['main-menu']['explore-menu']['children'] = $children;
			}
			
			// Populate the Dashboard menu if a user is logged in
			if(!is_null($this->Auth->user())) {
				$this->loadModel('ModuleUsers');
				$options['joins'] = array(
						array('table' => 'module_users',
								'alias' => 'ModuleUsers',
								'type' => 'INNER',
								'conditions' => array(
										'ModuleUsers.module_id = Modules.id'
								)
						)
				);
				$options['conditions'] = array(
						'ModuleUsers.user_id'=>$this->Auth->user('id'),
						'Modules.active' => true
				);
				$userModules = $this->Modules->find('all', $options);
				$userModuleChildren =  array(
					array (
						'title' => 'View My Dashboard',
						'url' => '/users/dashboard'
					),
					array(
						'title'=>"View My Profile",
						'url' => array(
								'plugin' => 'standard_profile_module',
								'controller' => 'profile',
								'action' => 'index',
								'admin' => false)),
					array (
							'separator' => '<li class="divider"></li>'));
				foreach ($userModules as $userModule):
					$userModuleChildren[] = array('title'=>$userModule['Modules']['name'],'url'=>'/' . $userModule['Modules']['base_url'] . '/module_dashboard');
				endforeach;
			
				if (count($userModuleChildren) != 0){ 
					$menu['main-menu']['dashboard-menu']['children'] = $userModuleChildren;
				}
			}
			
			// For default settings name must be menu
			$this->set(compact('menu'));
		}
	}
	
	/**
 	* isAuthorised method
 	* Check whether the given used is authorised.
 	* @param unknown $user
	* @return true or false.
 	*/
	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'super-admin') {
			return true;
		}
	
		// Default deny
		return false;
	}
	

	/**
	 * Helper function for exporting data from the database as a CSV file.
	 * @param unknown $model
	 * @param unknown $userId
	 * @param unknown $year
	 * @param unknown $month
	 */
	protected function exportCSVFile($model = null, $filename = null, $headerRow = null, $dataFields = null) {
		ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
		$this->layout = 'ajax';
	
		//create a file
		$csv_file = fopen('php://output', 'w');
	
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
	
		$options['joins'] = array(
				array('table' => 'profile',
						'alias' => 'Profile',
						'type' => 'LEFT',
						'conditions' => array(
								'Profile.user_id = '.get_class($model).'.user_id',
						)
				)
		);
		$options['conditions'] = array(
				'Profile.allow_research' => 1
		);
		
		$results = $model->find('all', $options);

		fputcsv($csv_file,$headerRow,',','"');
	
		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
		foreach($results as $result)
		{
			// Array indexes correspond to the field names in your db table(s)
			$row = array();
			
			foreach($dataFields as $dataField) {
				$row[] = $result[get_class($model)][$dataField];
			}

			fputcsv($csv_file,$row,',','"');
		}
	
		fclose($csv_file);
		$this->render('/AdminPanel/export');
	}
	
	/**
	 * Checks to see if the user is an admin or super-admin. Redirects to the user dashboard if they are not.
	 */
	protected function redirectIfNotAdmin() {
		if ($this->Auth->user('role') != 'admin' and $this->Auth->user('role') != 'super-admin' ) { // if not admin
			$this->redirect($this->Auth->redirect('/users/dashboard'));
		}
	}
}
?>