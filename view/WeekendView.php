<?php

class WeekendView 
{
    private static $submitbutton = 'Weekend::submitbutton';

    public function clickButton()
    {
        if(isset($_POST[self::$submitbutton]))
        {
            return $this->getTime();
        }
    }

    public function submitButton($model)
    {
        if ($model->isLoggedIn()) {
            return '
            <form method="post" name="form">
        
            <input type="submit" size="20" id="' . self::$submitbutton . '" name="' . self::$submitbutton . '" value="Click here!"/>       
           
            </form>
            ' . $this->clickButton();
        }
    }

    public function getTime()
    {
        $weekendDay = date('N');
        $hours = date('G'); 
        $minutes = date('i');
        $seconds = date('s');

        // difference between Fridag 5pm and now 
        $dayDifference = 5-$weekendDay;
        $hoursDifference = 16 - $hours;
        $minuteDifference = 60 - $minutes;
        $secondDifference = 60 -$seconds;
        
        if($weekendDay == '5' && $hours > 17 || $weekendDay == '6' || $weekendDay == '7')
        {
            return "ENJOY WEEKEND";
        }
        else
        {
            return "<h3>It is " 
            . $dayDifference  . " days, " 
            . $hoursDifference . " hours, " 
            . $minuteDifference . " minutes and " 
            . $secondDifference . " seconds 
            left to the weekend (Friday 5pm)</h3>";
        }
    }



}

