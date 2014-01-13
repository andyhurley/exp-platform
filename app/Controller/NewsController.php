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
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 */
class NewsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index','view','news_widget');
	}
	
	/**
	 * index method
	 *
	 * @return void
	 */
	 public function index() {
	 	$this->redirectIfNotAdmin();
	 	
		$this->redirect($this->Auth->redirect('/admin/news'));
	}
	
	 public function news_widget() {
	 	// Don't allow this method to be called directly from a URL
	 	if (empty($this->request->params['requested'])) {
	 		throw new ForbiddenException();
	 	}
	 	
	 	$news = $this->News->find('all', array('order' => 'News.created DESC', 'limit' => 3));
        $this->set('news', $news);
		$this->render();
	}
	
	public function admin_index() {
		$this->redirectIfNotAdmin();
		
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
		$this->set('title_for_layout', 'News Admin'); 
	}
	
	public function admin_view($id = null) {
		$this->redirectIfNotAdmin();
		
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		
		$news =  $this->News->findById($id);
		$this->set('news', $news);
		$title = $news['News']['headline'];
		$this->set('title_for_layout', 'News Admin: ' . $title);
	}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		$this->redirectIfNotAdmin();
		
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		}
		$this->set('title_for_layout', 'News Admin: Add News');
	}
	
	public function admin_edit($id = null) {
		$this->redirectIfNotAdmin();
		
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			// Was cancel clicked?
			if (isset($this->request->data['cancel'])) {
				$this->redirect(array('action' => 'view',$id));
			}
			
			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->News->findById($id);
		}
		$this->set('title_for_layout', 'News Admin: Edit News');
	}

	public function admin_delete($id = null) {
		$this->redirectIfNotAdmin();

		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		
		if ($this->News->delete()) {
			$this->Session->setFlash(__('News deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The News was not deleted'));
		$this->redirect(array('action' => 'index'));
		
		$this->set('title_for_layout', 'News Admin: Delete News');
	}
}
?>