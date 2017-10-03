<?php

// namespace w3
// {
	class DateTimeView 
	{		
		public function show() 
		{
			
			$weekendDay = date('l');
			$dateNumber = date('j');
			$monthNumber = date('F');
			$year = date('Y');
			$time = date('G:i:s');
			
			$timeString = $weekendDay .', '. 'the ' . $dateNumber .'th of '.  $monthNumber .' '. $year . ', The time is ' . $time;
			
			return '<p>' . $timeString .  '</p>';
		}
	}	
// }