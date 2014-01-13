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
/**
 * SimpleHealthTestScreener Test Case
 *
*/
class SimpleHealthTestScreenerTest extends CakeTestCase {

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
			'plugin.example_module.simple_health_test_screener',
			'user',
			'profile',
			'module',
			'module_user'
	);

	/**
	 * setUp method
	 *
	 * @return void
	*/
	public function setUp() {
		parent::setUp();
		$this->SimpleHealthTestScreener = ClassRegistry::init('ExampleModule.SimpleHealthTestScreener');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->SimpleHealthTestScreener);

		parent::tearDown();
	}

	/**
	 * testCalculateScore method
	 *
	 * @return void
	 */
	public function testCalculateScoreHealthy() {
		$this->SimpleHealthTestScreener->create();
		$this->SimpleHealthTestScreener->set('healthy','Y');

		$result = $this->SimpleHealthTestScreener->calculateScore();

		$this->assertEquals(100, $result);
	}

	/**
	 * testCalculateScore method
	 *
	 * @return void
	 */
	public function testCalculateScoreUnhealthy() {
		$this->SimpleHealthTestScreener->create();
		$this->SimpleHealthTestScreener->set('healthy','N');

		$result = $this->SimpleHealthTestScreener->calculateScore();

		$this->assertEquals(99, $result);
	}

}
