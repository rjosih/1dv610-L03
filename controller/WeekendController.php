<?php

class WeekendController
{
    private $weekend;
    
        public function __construct()
        {
            $this->weekend = new WeekendView();
        }
        
        public function hej()
        {
            if($this->sessionUserNameIsAdmin && $this->sessionPasswordIsPassword)
            {
                $this->weekend->submitButton();
            }
        
        }
}