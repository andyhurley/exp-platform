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
/**
 * SimpleHealthTestScreenerFixture
 *
 */
class SimpleHealthTestScreenerFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('table' => 'simple_health_test_screeners');

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = array(
			array(
					'id' => '1',
					'user_id' => '1',
					'healthy' => 'Y',
					'score' => '100',
					'created' => '2013-02-22 22:46:20',
					'modified' => '2013-03-07 15:26:41'
			),
			array(
					'id' => '2',
					'user_id' => '2',
					'healthy' => 'N',
					'score' => '99',
					'created' => '2013-02-22 22:46:20',
					'modified' => '2013-03-07 15:26:41'
			),
	);
}
