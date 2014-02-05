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
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 */
class Module extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $hasMany = array('ModuleUser');

	/**
	 * Returns the id of the module in the database, according to the given module Name.
	 * @param unknown $moduleName the name of the module
	 */
	public function getModuleID($moduleName) {
		$options = array('conditions' => array('name' => $moduleName));
		$module = $this->find('first', $options);
		if(empty($module)) {
			return 0;
		}
		return $module['Module']['id'];
	}
}
