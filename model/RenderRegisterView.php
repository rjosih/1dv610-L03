<?php

class RenderRegisterView
{
   
  public function RenderRegisterView()
   {
       $test = (isset($_GET['register']) || isset($_GET['?register']));
       $test2 = (isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin'); 
    }
}