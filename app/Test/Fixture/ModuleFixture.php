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
 * ModuleFixture
 *
 */
class ModuleFixture extends CakeTestFixture {

/**
 * Import
 *
 * @var array
 */
	public $import = array('model' => 'Module');

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'Healthy Eating &ndash; &lsquo;5-a-day&rsquo;',
			'version' => '1',
			'type' => 'daily',
			'parent_id' => '0',
			'base_url' => 'healthy_eating_module/five_a_day',
			'icon_url' => 'healthy_eating_module/img/five_a_day/icon.png',
			'created' => '2013-03-11 00:00:00',
			'modified' => '2013-03-11 00:00:00'
		),
		array(
			'id' => '2',
			'name' => 'Dave&apos;s module',
			'version' => '1',
			'type' => 'daily',
			'parent_id' => '0',
			'base_url' => 'dave_module/daves',
			'icon_url' => 'dave_module/img/icon.png',
			'created' => '2013-03-08 10:01:31',
			'modified' => '2013-03-08 10:01:34'
		),
		array(
			'id' => '3',
			'name' => 'Test module',
			'version' => '1',
			'type' => 'weekly',
			'parent_id' => '0',
			'base_url' => 'test_module/tests',
			'icon_url' => 'test_module/img/icon.png',
			'created' => '2013-02-22 23:38:26',
			'modified' => '2013-02-22 23:38:26'
		),
	);

}
