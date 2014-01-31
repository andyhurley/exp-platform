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
class ProfileController extends StandardProfileModuleAppController implements ModulePlugin {
	public $components = array('RequestHandler');

	public $module_name = 'Standard Profile';
	public $base_url = 'standard_profile_module/profile';
	
	public function beforeRender() {
		parent::beforeRender();
		$this->set('module_name', $this->module_name());
		$this->set('module_icon_url', $this->module_icon_url());
	}
	
	/**
	 * Default index function for the module. If the module is on the user's dashboard, then they are
	 * automatically redirected to the module dashboard. Otherwise, they're redirected to the 'explore_module' view.
	 */
	public function index() {
		$this->loadModel('User');
		
		$this->set('user', $this->User->findById($this->Auth->user('id')));
		$this->set('title_for_layout', 'My Profile');
	}
	
	public function dashboard_widget() {
		// Don't allow this method to be called directly from a URL
		if (empty($this->request->params['requested'])) {
			throw new ForbiddenException();
		}
		$this->render();
	}
	
	public function dashboard_news() {
		// Don't allow this method to be called directly from a URL
		if (empty($this->request->params['requested'])) {
			throw new ForbiddenException();
		}
  		
		$this->render();
	}

	/**
	 * Returns the public name of the module.
	 * 
	 * @return string
	 */
 	public function module_name() {
  		return $this->module_name;
  	}

  	/**
  	 * Returns the type of module (e.g. dashboard, widget, survey, profile).
  	 *
  	 * @return string
  	 */
  	public function module_type() {
  		return 'profile';
  	}
  	
  	/**
  	 * Returns the base URL for this module.
  	 *
  	 * @return string
  	 */
  	public function module_base_url() {
  		return $this->base_url;
  	}
  	
  	/**
  	 * Returns the path to the icon for this module.
  	 *
  	 * @return string
  	 */
  	public function module_icon_url() {
  		return '/standard_profile_module/img/icon.png';
  	}
  	
  	/**
  	 * Initial landing screen for finding out what the module is about. This is the first
  	 * page that a non-logged in user will see when they arrive in the module.
  	 */
 	public function explore_module() {
 		return $this->redirect('index');
 	}

 	/**
 	 * Initial landing screen for the process of a logged-in user adding the module to their
 	 * dashboard.
 	 */
 	public function add_module() {
 		return $this->redirect('index');
 	}
  
  	/**
  	 * 'Home page' for the module, when accessed by a logged-in user from their dashboard.
  	 *
  	 * Will usually contain feedback / charts on their achievements so far, along with the
  	 * ability to quickly make a new data entry.
  	 */
	public function module_dashboard($year = null,$month = null) {
 		return $this->redirect('index');
  	}
  	
  	public function editProfile() {
  		$this->loadModel('User');
  		
  		if ($this->request->is('post') || $this->request->is('put')) {
  			// Was cancel clicked?
  			if (isset($this->request->data['cancel'])) {
  				return $this->redirect(array('action' => 'index'));
  			}
  			
  			// Get user id from current user session, rather than from form
  			$currentUser = $this->User->findById($this->Auth->user('id'));
  			$this->request->data['User']['id'] = $currentUser['User']['id'];
  			$this->request->data['Profile']['user_id'] = $currentUser['User']['id'];
  			$this->request->data['Profile']['id'] = $currentUser['Profile']['id'];
  				
  			// Has password changed?
  			if (!empty($this->request->data['User']['new_password'])) {
  				if($this->request->data['User']['new_password'] != $this->request->data['User']['repeat_password']) {
  					$this->Session->setFlash(__('Your passwords did not match. Please, try again.'));
  					return;
  				} else {
  					$this->request->data['User']['password'] = $this->request->data['User']['new_password'];
  				}
  			}
  				
  			if ($this->User->saveAssociated($this->request->data)) {
  				$this->Session->setFlash('Your profile has been updated', 'default', array('class' => 'alert alert-success'));
  				$this->redirect(array('action' => 'index'));
  			} else {
  				$this->Session->setFlash(__('Your profile could not be saved. Please, try again.'));
  			}
  		} else {
  			$this->request->data = $this->User->findById($this->Auth->user('id'));
  		}
  	
  		$this->set('title_for_layout', 'Edit My Profile');
  	}
  	
  	public function addProfile() {
  		$this->loadModel('User');
  		
  		// Does the user already have a profile stored? If so, send them to edit it instead...
  		$currentUser = $this->User->findById($this->Auth->user('id'));
  	
  		if(!is_null($currentUser['Profile']['id'])) {
  			return $this->redirect(array('action' => 'editProfile'));
  		}
  	
  		if ($this->request->is('post') || $this->request->is('put')) {
  			// Get user id from current user session, rather than from form
  			$this->request->data['User']['id'] = $currentUser['User']['id'];
  			$this->request->data['User']['email'] = $currentUser['User']['email'];
  			$this->request->data['Profile']['user_id'] = $currentUser['User']['id'];
  				
  			if ($this->User->saveAssociated($this->request->data)) {
  				$userName = $this->request->data['Profile']['name'];
  				$emailAddress = $currentUser['User']['email'];
  	
  				// Send the registration email.
  				$Email = new CakeEmail('default');
  				$Email->template('registration', 'default')
  				->emailFormat('both')
  				->to($emailAddress)
  				->subject($this->siteName.' : Welcome');
  					
  				$Email->viewVars(array('userName' => $userName, 'siteName' => $this->siteName));
  					
  				$Email->send();
  	
  				$this->redirect(array('action' => 'healthScore'));
  			} else {
  				$this->Session->setFlash(__('Your profile could not be saved. Please, try again.'));
  			}
  		} else {
  			$this->request->data = $currentUser;
			$this->request->data['Profile']['date_of_birth'] = mktime(0,0,0,date("m")-1,date("d"),date("Y")-18);
  		}
  		$this->set('title_for_layout', 'Set Up My Profile');
  	}

  	/**
  	 * Allows the user to record their current health score (from 0 to 100).
  	 */
  	public function healthScore() {
  		$this->loadModel('User');
  		$this->loadModel('StandardProfileModule.HealthScore');
  		
  		$this->set('title_for_layout', 'Your Current Health');
  	
  		// Does the user already have a profile stored? If so, send them to edit it instead...
  		$currentUser = $this->User->findById($this->Auth->user('id'));
  		
  		if ($this->request->is('post') || $this->request->is('put')) {
  			// Get user id from current user session, rather than from form
  			$this->request->data['HealthScore']['user_id'] = $currentUser['User']['id'];
  			
  			// Get hold of the posted data
  			$this->HealthScore->create();
  			$this->HealthScore->set($this->request->data);
  			
  			if ($this->HealthScore->validates()) {
	  			if ($this->HealthScore->save()) {
	  				$this->Session->setFlash('Your profile has now been set up - just a few more questions remaining...', 'default', array('class' => 'alert alert-success'));
	  				$this->redirect(array('action' => 'generalHealth'));
	  			} else {
	  				$this->Session->setFlash(__('Your health score could not be saved. Please, try again.'));
	  			}
  			} else {
  				// Validation failed
  				$this->Session->setFlash(__('Your health score could not be saved. Please see the error messages below, and try again.'));
  			}
  		} else {
  			$this->HealthScore->create();
  			$this->request->data = $this->HealthScore->data;
  		}
  	}
  	
  	/**
  	 * Allows the user to record their general health profile information.
  	 */
  	public function generalHealth() {
  		$this->loadModel('User');
  		$this->loadModel('StandardProfileModule.GeneralHealth');
  	
  		$this->set('title_for_layout', 'Your General Health');
  		 
  		// Does the user already have a profile stored? If so, send them to edit it instead...
  		$currentUser = $this->User->findById($this->Auth->user('id'));
  	
  		if ($this->request->is('post') || $this->request->is('put')) {
  			// Get user id from current user session, rather than from form
  			$this->request->data['GeneralHealth']['user_id'] = $currentUser['User']['id'];
  				
  			// Get hold of the posted data
  			$this->GeneralHealth->create();
  			$this->GeneralHealth->set($this->request->data);
  				
  			if ($this->GeneralHealth->validates()) {
  				if ($this->GeneralHealth->save()) {
  					$this->Session->setFlash('Your profile has now been set up - you&rsquo;re ready to go!', 'default', array('class' => 'alert alert-success'));
  					$this->redirect(array('plugin' => false, 'controller' => 'users', 'action' => 'dashboard'));
  				} else {
  					$this->Session->setFlash(__('Your general health details could not be saved. Please, try again.'));
  				}
  			} else {
  				// Validation failed
  				$this->Session->setFlash(__('Your general health details could not be saved. Please see the error messages below, and try again.'));
  			}
  		} else {
  			// It hasn't been posted so we are either adding a new entry or editing the form:
			$this->GeneralHealth->create();
			$previousEntry = $this->GeneralHealth->findByUserId($this->Auth->user('id'));

			// If so, edit this entry instead of creating a new one...
			if(!empty($previousEntry)){
				$this->request->data = $previousEntry;
			} else {
				$this->request->data = $this->GeneralHealth->data;
			}
  		}
  	}
  	
  	/**
  	 * Allows the user to record their equality profile information.
  	 */
  	public function equality() {
  		$this->loadModel('User');
  		$this->loadModel('StandardProfileModule.Equality');
  		 
  		$this->set('title_for_layout', 'Equality Profile');
  			
  		// Does the user already have a profile stored? If so, send them to edit it instead...
  		$currentUser = $this->User->findById($this->Auth->user('id'));
  		 
  		if ($this->request->is('post') || $this->request->is('put')) {
  			// Was cancel clicked?
  			if (isset($this->request->data['cancel'])) {
  				return $this->redirect(array('action' => 'index'));
  			}
  			
  			// Get user id from current user session, rather than from form
  			$this->request->data['Equality']['user_id'] = $currentUser['User']['id'];
  	
  			// Get hold of the posted data
  			$this->Equality->create();
  			$this->Equality->set($this->request->data);
  	
  			if ($this->Equality->validates()) {
  				if ($this->Equality->save()) {
  					$this->Session->setFlash('Your equality profile has been updated', 'default', array('class' => 'alert alert-success'));
  					$this->redirect(array('action' => 'index'));
  				} else {
  					$this->Session->setFlash(__('Your equality profile could not be saved. Please, try again.'));
  				}
  			} else {
  				// Validation failed
  				$this->Session->setFlash(__('Your equality profile could not be saved. Please see the error messages below, and try again.'));
  			}
  		} else {
  			// It hasn't been posted so we are either adding a new entry or editing the form:
  			$this->Equality->create();
  			$previousEntry = $this->Equality->findByUserId($this->Auth->user('id'));
  	
  			// If so, edit this entry instead of creating a new one...
  			if(!empty($previousEntry)){
  				$this->request->data = $previousEntry;
  			} else {
  				$this->request->data = $this->Equality->data;
  			}
  		}
  	}
  	

  	/**
  	 * Exports a full set of profile data, but only for users who have 'allowed research'.
  	 */
  	public function admin_profile_export() {
  		$this->redirectIfNotAdmin();

  		$this->loadModel('User');
  		$this->loadModel('StandardProfileModule.HealthScore');
  		$this->loadModel('StandardProfileModule.GeneralHealth');
  		$this->loadModel('StandardProfileModule.Equality');
  	
  		ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
  		$this->layout = 'ajax';
  	
  		//create a file
  		$filename = "profile_export_".date("Y.m.d").".csv";
  		$csv_file = fopen('php://output', 'w');
  	
  		header('Content-type: application/csv');
  		header('Content-Disposition: attachment; filename="'.$filename.'"');

  		$options['joins'] = array(
  				array('table' => 'health_scores',
  						'alias' => 'HealthScore',
  						'type' => 'LEFT',
  						'conditions' => array(
  								'HealthScore.user_id = User.id',
  						)
  				),
  				array('table' => 'profile_general_health',
  						'alias' => 'GeneralHealth',
  						'type' => 'LEFT',
  						'conditions' => array(
  								'GeneralHealth.user_id = User.id',
  						)
  				),
  				array('table' => 'profile_equal_opps',
  						'alias' => 'Equality',
  						'type' => 'LEFT',
  						'conditions' => array(
  								'Equality.user_id = User.id',
  						)
  				)
  		);
  		
  		$options['fields'] = array(
  				'*'
  		);
  		
  		$options['conditions'] = array(
  				'Profile.allow_research' => 1
  		);
  		
  		$results = $this->User->find('all', $options);
  		
  		// The column headings of your .csv file
  		$header_row = array(
  				"User ID",
  				"Gender",
  				"Date of birth",
  				"Height (CM)",
  				"Post code",
  				"Allow research",
  				"Health score",
  				"General health",
  				"Nervous",
  				"Worry",
  				"Little interest",
  				"Feeling down",
  				"Supervisor",
  				"Occupation",
  				"Sickness absence",
  				"Sickness absence spells",
  				"Work performance",
  				"Disability",
  				"Sexual orientation",
  				"Ethnicity",
  				"Religion",
  				"Marital status"
  		);
  	
  		fputcsv($csv_file,$header_row,',','"');
  	
  		// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
  		foreach($results as $result)
  		{
  			// Array indexes correspond to the field names in your db table(s)
  			$row = array(
  					$result['User']['id'],
  					$result['Profile']['gender'],
  					$result['Profile']['date_of_birth'],
  					$result['Profile']['height_cm'],
  					$result['Profile']['post_code'],
  					$result['Profile']['allow_research'],
  					$result['HealthScore']['score'],
  					$result['GeneralHealth']['general_health'],
  					$result['GeneralHealth']['nervous'],
  					$result['GeneralHealth']['worrying'],
  					$result['GeneralHealth']['little_interest'],
  					$result['GeneralHealth']['feeling_down'],
  					$result['GeneralHealth']['supervisor'],
  					$result['GeneralHealth']['occupation'],
  					$result['GeneralHealth']['sickness_absence'],
  					$result['GeneralHealth']['sickness_absence_spells'],
  					$result['GeneralHealth']['work_performance'],
  					$result['Equality']['disability'],
  					$result['Equality']['sexual_orientation'],
  					$result['Equality']['ethnicity'],
  					$result['Equality']['religion'],
  					$result['Equality']['marital_status']
  			);
  			
  			fputcsv($csv_file,$row,',','"');
  		}
  	
  		fclose($csv_file);
  		$this->render('/AdminPanel/export');
  	}
  	
  	/**
  	 * Handles the weekly data entry form for this module.
  	 * 
  	 * @param string $date the date for which this entry relates. If null, today's date will be used.
  	 */
	public function data_entry($date = null) {
 		return $this->redirect('index');
  	}
  
  	/**
  	 * Returns the total number of weekly data records that have been recorded by this module.
  	 * 
  	 * @throws ForbiddenException
  	 * @return number
  	 */
  	public function total_data_records() {
  		// Don't allow this method to be called directly from a URL
  		if (empty($this->request->params['requested'])) {
  			throw new ForbiddenException();
  		}
  		
  		return 0;
  	}
	
  	/**
  	 * Admin panel view.
  	 */
  	public function admin_module_data() {
  		$this->redirectIfNotAdmin();
  	}
  	
  	/**
  	 * Tidies up database in preparation for the module to be deleted from the website.
  	 */
  	public function admin_delete_module() {
  		$this->redirectIfNotAdmin();
  		
  	}
  	
  	/**
  	 * Returns the SQL necessary to create and set up the module for use.
  	 * 
  	 * @return array of SQL commands to execute
  	 */
  	public function admin_install_sql() {
  		$this->redirectIfNotAdmin();
  		
  		return '';
  	}
}
?>