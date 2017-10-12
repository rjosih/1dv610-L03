<?php

class Weekend 
{
    public function getTime()
    {
        $weekendDay = date('N');
        $hours = date('G'); 
        $minutes = date('i');
        $seconds = date('s');

        $dayDifference = 5-$weekendDay;
        $hoursDifference = 11 - $hours;
        $minuteDifference = 60 - $minutes;
        $secondDifference = 60 -$seconds;
        
        if($weekendDay == '5' && $hours > 17 || $weekendDay == '6' || $weekendDay == '7')
        {
            echo "ENJOY WEEKEND";
        }
        else
        {
            echo "It is " 
            . $dayDifference  . " days, " 
            . $hoursDifference . " hours, " 
            . $minuteDifference . " minutes and " 
            . $secondDifference . " seconds left to the weekend 
            (Friday 5pm)";
        }
        
    }
}

