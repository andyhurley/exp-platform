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
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.profile',
		'app.module',
		'app.module_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

/**
 * testFindById method
 *
 * @return void
 */
	public function testFindFirstUser() {
		$result = $this->User->findById(1);
		$this->assertEquals(1, $result['User']['id']);
		$this->assertEquals('andy@itsallnice-digital.co.uk', $result['User']['email']);
		$this->assertEquals('1974-03-01', $result['Profile']['date_of_birth']);
		$this->assertEquals('1', $result['ModuleUser'][0]['position']);
	}
	
	/**
	 * testFindById method
	 *
	 * @return void
	 */
	public function testFindLastUser() {
		$result = $this->User->findById(4);
		$this->assertEquals(4, $result['User']['id']);
		$this->assertEquals('test-user@example.com', $result['User']['email']);
		$this->assertNull($result['Profile']['date_of_birth']);
		$this->assertEquals('1', $result['ModuleUser'][0]['position']);
	}
	
	/**
	 * testFindById method
	 *
	 * @return void
	 */
	public function testGetInvalidUser() {
		$result = $this->User->findById(5);
		
		$this->assertEmpty($result);
	}
	
	public function testAddModule() {
		$result = $this->User->addModule(1,3);
		$this->assertTrue($result);
	}
	
	public function testAddModuleAlreadyOnDashboard() {
		$result = $this->User->addModule(1,2);
		$this->assertFalse($result);
	}

}
