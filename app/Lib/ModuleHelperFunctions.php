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
class ModuleHelperFunctions {
	/**
	 * Returns the week beginning date for the given date (starting on a Monday).
	 *
	 * @param string $date
	 */
	public function _getWeekBeginningDate($date) {
		$dateTime = strtotime("2:00 " . $date);
		if(date('w',$dateTime) == '1') {
			// It's Monday, so return the same date
			return $dateTime;
		} else {
			// return last Monday's date
			return strtotime('this week last monday', $dateTime);
		}
	}
	
	/**
	 * Returns the set of monthly calendar entries for the given year and month, along with an indication of
	 * achievement level for each day, in a format ready to pass to the CalendarHelper class.
	 * 
	 * @param string $model
	 * @param string $user_id
	 * @param string $year
	 * @param string $month
	 * @param array $targetLevels
	 * @return array
	 */
	public function getMonthlyCalendarEntries($model = null, $userId = null, $year = null, $month = null, $targetLevels = null) {
		// Use today's date if no date given.
		if(is_null($month)) $month = gmdate("F");
		if(is_null($year)) $year = gmdate("Y");
	
		// Calculate the month number and week-beginning date for the first of the month
		$monthnum = gmdate('n', strtotime("2:00 1 ".$month. " ".$year));
		$monthStartDate = gmmktime(2,0,0,$monthnum,1,$year);
		$monthWeekBeginning = $this->_getWeekBeginningDate(gmdate("Ymd",$monthStartDate));
	
		// Retrieve all the weekly entries between the start week and the last day of the month
		$allEntries = $model->find('all',array(
				'conditions' => array(
						'user_id' => $userId,
						'week_beginning >=' => gmdate("Y-m-d",$monthWeekBeginning),
						'week_beginning <=' => gmdate("Y-m-t",$monthStartDate)
				),
				'order' => array('week_beginning' => 'asc')
		));
	
		$records = array();
		$weekdayList = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
	
		// Iterate through the entries and reformat them as, e.g., array( 1 => '10', 2 => '5', 14 => '2'... 31 => '12')
		foreach($allEntries as $key => $weeklyEntry) {
			foreach($weekdayList as $weekDayNo => $weekday) {
				$weekDayDate = strtotime("2:00 " . $weeklyEntry[get_class($model)]['week_beginning']
						. " +" . $weekDayNo . " day");
				
				// Which target level did the daily entry reach?
				$dayLevel = count($targetLevels) - 1;
				foreach($targetLevels as $level => $target) {
					if ($weeklyEntry[get_class($model)][$weekday] >= $target) {
						$dayLevel = $level;
						break;
					}
				}
				
				if(date('n Y', $weekDayDate) == $monthnum . " " . $year) {
					$records[date('j', $weekDayDate)] = array(
							'entry' => $weeklyEntry[get_class($model)][$weekday],
							'whatworked' => $weeklyEntry[get_class($model)]['what_worked'],
							'level' => $dayLevel
					);
				}
			}
		}
	
		return $records;
	}
	
	/**
	 * Returns the total number of consecutive weekly records for the given user and model which have a
	 * 'total' score of greater than or equal to $healthyScore. This routine works backwards from the last 'week beginning
	 * Monday' of the current date.
	 *  
	 * @param string $model
	 * @param string $user_id
	 * @param number $healthyScore
	 * @return number
	 */
	public function totalWeeksHealthyConsec($model = null, $user_id = null, $healthyScore = 0) {
		$currentDate = date('Y-m-d',$this->_getWeekBeginningDate(date('Y-m-d')));
		$expectedWeek = date('Y-m-d',strtotime("last week " . $currentDate));
		
		// Retrieve all the weekly entries between the start week and the last day of the month
		$healthyWeeks = $model->find('all',array(
				'conditions' => array(
						'user_id' => $user_id,
						'total >=' => $healthyScore,
						'week_beginning <=' => $expectedWeek
				),
				'order' => array('week_beginning' => 'desc')
		));
		
		$total = 0;
		
		foreach($healthyWeeks as $week)
		{
			$weekBeginning = $week[get_class($model)]['week_beginning'];
			
			// Is there a gap between entries?
			if ($expectedWeek != $weekBeginning) return $total; // the weeks are not consecutive - so return the total.
			
			$expectedWeek = date('Y-m-d',strtotime("last week " . $weekBeginning));
			$total++;
		}
		return $total; // number of consecutive healthy weeks
	}
	
	/**
	 * Searches the given array for matching key=>value pairs. Returns an array of results.
	 */
	public function search($array, $key, $value)
	{
		$results = array();
	
		if (is_array($array))
		{
			if (isset($array[$key]) && $array[$key] == $value)
				$results[] = $array;
	
			foreach ($array as $subarray)
				$results = array_merge($results, $this->search($subarray, $key, $value));
		}
	
		return $results;
	}
}
?>