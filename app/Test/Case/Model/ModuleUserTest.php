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
App::uses('ModuleUser', 'Model');

/**
 * ModuleUser Test Case
 *
 */
class ModuleUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.module_user',
		'app.user',
		'app.profile',
		'app.module'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ModuleUser = ClassRegistry::init('ModuleUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModuleUser);

		parent::tearDown();
	}

/**
 * testGetModuleList method
 *
 * @return void
 */
	public function testGetModuleList() {
		$result = $this->ModuleUser->getModuleList(1);
		$this->assertEquals(2, count($result));
		$this->assertEquals(1, $result[0]['ModuleUser']['module_id']);
		$this->assertEquals(1, $result[0]['ModuleUser']['position']);
		$this->assertEquals('healthy_eating_module/five_a_day', $result[0]['Module']['base_url']);
	}

/**
 * testGetNextPosition method
 *
 * @return void
 */
	public function testGetNextPosition() {
		$result = $this->ModuleUser->getNextPosition(1);
		$this->assertEquals(3, $result);
		
		$result = $this->ModuleUser->getNextPosition(4);
		$this->assertEquals(2, $result);
	}

/**
 * testAlreadyOnDashboard method
 *
 * @return void
 */
	public function testAlreadyOnDashboard() {
		$result = $this->ModuleUser->alreadyOnDashboard(1,1);
		$this->assertEquals(true, $result);
		
		$result = $this->ModuleUser->alreadyOnDashboard(1,99);
		$this->assertEquals(false, $result);
		
		$result = $this->ModuleUser->alreadyOnDashboard(1,3);
		$this->assertEquals(false, $result);
	}

}
