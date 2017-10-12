<?php

class Weekend 
{
    public function getTime()
    {
        $weekendDay = date('l'); // veckodag
        if($weekendDay == 'Friday' || $weekendDay == 'Saturday' || $weekendDay == 'Sunday')
        {
            echo "WEEKEND";
        }
        else
        {
            echo "Not weekend";
        }
        
    }
    // echo "sda";
}

