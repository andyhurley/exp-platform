<?php
class FiveADayController extends HealthyEatingModuleAppController implements ModulePlugin {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('explore_module'); // Let anyone explore the module, whether they're logged in or not.
	}
	
	public function beforeRender() {
		$this->set('module_name', $this->_module_name());
		$this->set('module_icon_url', $this->_module_icon_url());
	}
	
	public function dashboard_widget() {
		// Don't allow this method to be called directly from a URL
		if (empty($this->request->params['requested'])) {
			throw new ForbiddenException();
		}
		$this->set('message', "Hello from the " . $this->_module_name());
		$this->render();
	}
	
	public function dashboard_news() {
		// Don't allow this method to be called directly from a URL
		if (empty($this->request->params['requested'])) {
			throw new ForbiddenException();
		}
		$this->set('message', "News from the " . $this->_module_name());
		$this->render();
	}

	/**
	 * Returns the public name of the module.
	 * 
	 * @return string
	 */
 	public function _module_name() {
  		return 'Healthy Eating &ndash; &lsquo;5-a-day&rsquo;';
  	}
  	
  	/**
  	 * Returns the path to the icon for this module.
  	 * 
  	 * @return string
  	 */
  	public function _module_icon_url() {
  		return '/healthy_eating_module/img/five_a_day/icon.png';
  	}

  	/**
  	 * Initial landing screen for finding out what the module is about. This is the first
  	 * page that a non-logged in user will see when they arrive in the module.
  	 */
 	public function explore_module() {
  		$this->set('message', "This is just a test module, while we work on the module interface");
 	}

 	/**
 	 * Initial landing screen for the process of a logged-in user adding the module to their
 	 * dashboard.
 	 */
 	public function add_module() {
  		// Nothing to do here - just go straight to the view
 	}
  
	/**
	 * Handles the submission, validation of the screener page. Initial post (which will not
	 * contain a score) redirects the user to the 'score' view. (The original form-entered data
	 * is hidden on the score page).
	 * 
	 * If the user then submits the 'score' form (by choosing to add the module to their dashboard)
	 * then the post will contain a score, and the screener submission will be saved to the
	 * database.
	 * 
	 * TODO: This routine still needs to add the module to the user's dashboard, but haven't
	 * yet decided how best to do that...
	 */
	public function screener() {
  		$this->loadModel('HealthyEatingModule.FiveADayScreener');
	  	
	  	if ($this->request->is('post')) {
			$this->FiveADayScreener->create();
			$this->FiveADayScreener->set($this->request->data);
			if ($this->FiveADayScreener->validates()) {
				if(isset($this->request->data['FiveADayScreener']['score'])) {
					// Score has been submitted, so the user has clicked to 'add module to dashboard'
					$score = $this->FiveADayScreener->calculateScore();
					$this->FiveADayScreener->save();
					$this->redirect('module_added');
				} else {
					// No score yet, so the user has only just submitted the original form.
					// Calculate the score, and then redirect the user to the final page.
					$score = $this->FiveADayScreener->calculateScore();
					$this->set('score', $score);
					$this->FiveADayScreener->set('score', "".$score);
					$this->set($this->FiveADayScreener->data);
					$this->render('score');
				}
			} else {
				// Validation failed
				$this->Session->setFlash(__('Your score could not be calculated - Did you miss some questions? See the error messages below. Please, try again.'));
				$this->render('screener');
			}
		}
  	}
  	
  	/**
  	 * Landing page when the module has been added to the user's dashboard.
  	 */
	public function module_added() {
  		$this->set('message', "The healthy eating module has now been added to your dashboard.");
  	}
	
  	/**
  	 * 'Home page' for the module, when accessed by a logged-in user from their dashboard.
  	 *
  	 * Will usually contain feedback / charts on their achievements so far, along with the
  	 * ability to quickly make a new data entry.
  	 */
	public function module_dashboard() {
  		$this->set('message', "This is the 'home page' for the module, and will display feedback on module progress, and links to data entry screens");
  	}
  
 	public function data_entry() {
		//var $helpers = array('Session');
  		$this->set('message', "This is the data entry page, allowing capture of daily, weekly or one-off achievements");
  		$this->loadModel('HealthyEatingModule.FiveADayWeekly');
		if ($this->request->is('post')) {
			$this->FiveADayWeekly->create();
			$this->FiveADayWeekly->set($this->request->data);
			if ($this->FiveADayWeekly->validates()) {
				$this->FiveADayWeekly->save();
			} else {
				// Validation failed
				$this->Session->setFlash(__('Your entry could not be saved? See the error messages below. Please, try again.'));
				$this->render();
			}
		}
  	}
  
  	public function review_progress() {
  		return "This page will allow the logged-in user to review their progress against the module";
  	}
}
?>