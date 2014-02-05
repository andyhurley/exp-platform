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
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'User');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'email' => 'andy@itsallnice-digital.co.uk',
			'password' => '27bf973165c423667ae19848570a56a28f9c4567',
			'role' => 'super-admin',
			'created' => '2013-02-22 22:46:20',
			'modified' => '2013-03-07 15:26:41'
		),
		array(
			'id' => '2',
			'email' => 'david.burton@doivedesigns.co.uk',
			'password' => '679f61ec0a883203ec173b54fd66275fefa0df71',
			'role' => 'super-admin',
			'created' => '2013-02-22 22:55:25',
			'modified' => '2013-02-22 22:55:25'
		),
		array(
			'id' => '3',
			'email' => 'test-admin@example.com',
			'password' => '27bf973165c423667ae19848570a56a28f9c4567',
			'role' => 'admin',
			'created' => '2013-02-22 22:57:01',
			'modified' => '2013-02-22 22:57:01'
		),
		array(
			'id' => '4',
			'email' => 'test-user@example.com',
			'password' => '27bf973165c423667ae19848570a56a28f9c4567',
			'role' => 'user',
			'created' => '2013-02-22 22:57:18',
			'modified' => '2013-02-22 22:57:18'
		),
	);

}
