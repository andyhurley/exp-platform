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
 * SimpleHealthTestWeeklyFixture
 *
 */
class SimpleHealthTestWeeklyFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'simple_health_test_weekly';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'monday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tuesday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'wednesday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'thursday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'friday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'saturday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'sunday' => array('type' => 'integer', 'null' => false, 'default' => null),
		'total' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date' => '2013-03-16 14:02:51',
			'user_id' => 1,
			'monday' => 1,
			'tuesday' => 1,
			'wednesday' => 1,
			'thursday' => 1,
			'friday' => 1,
			'saturday' => 1,
			'sunday' => 1,
			'total' => 1,
			'created' => '2013-03-16 14:02:51',
			'modified' => '2013-03-16 14:02:51'
		),
	);

}
