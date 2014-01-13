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
App::uses('SimpleHealthTestWeekly', 'ExampleModule.Model');

/**
 * SimpleHealthTestWeekly Test Case
 *
 */
class SimpleHealthTestWeeklyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.example_module.simple_health_test_weekly',
		'plugin.example_module.user',
		'plugin.example_module.profile',
		'plugin.example_module.module_user',
		'plugin.example_module.module'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SimpleHealthTestWeekly = ClassRegistry::init('ExampleModule.SimpleHealthTestWeekly');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SimpleHealthTestWeekly);

		parent::tearDown();
	}

}
