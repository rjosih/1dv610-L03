<?php

class DateTimeView {


	public function show() {

		$weekendDay = date('l');
		$dateNumber = date('j');
		$monthNumber = date('F');
		$year = date('Y');
		$time = date('G:i:s');
		
		$timeString = $weekendDay .', '. 'the ' . $dateNumber .'th '.  $monthNumber .' '. $year . ', The time is ' . $time;

		return '<p>' . $timeString . '</p>';
	}
}


// 'Friday, the 8th of September 2017, The time is '