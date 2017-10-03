<?php

class SessionFile
{    
    function loggedIn()
    {
        if(isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
        {
            return true;
        }
    }
}