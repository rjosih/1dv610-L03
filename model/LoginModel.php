<?php

class LoginModel
{
  public $message;
 
  public function sessionUserName()
  {
    if(isset($_SESSION['Username']))
    {
      return $_SESSION['Username'];
    }
    return "";
  }


  public function sessionUserNameIsAdmin()
  {
    if(isset($_SESSION['Username']) && $_SESSION['Username'] =='Admin')
    {
      return $_SESSION['Username'] =='Admin';
    }
    return "";
  }

  public function sessionPassword()
  {
    if(isset($_SESSION['Password']))
    {
      return $_SESSION['Password'];
    }
    return "";
  }

  public function sessionPasswordIsPassword()
  {
    if(isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password')
    {
      $_SESSION['Password'] == 'Password';
    }
    return "";
  }

  public function sessionMessage()
  {
    if($_SESSION['message'] = '')
    {
      return $_SESSION['message'] = '';
    }
    return "";
  }
  public function validateInfo($postUsername, $postPassword)
  {
    if($postUsername == '')
    {
        $this->message = 'Username is missing';
    }
    else if($postPassword == '')
    {
        $this->message = 'Password is missing';
    }
    else if($postUsername !== 'Admin' || $postPassword == 'Password')
    {
       $this->message = 'Wrong name or password';
    }
    else
    {
        $this->message = '';
    }
  }
  public function login()
  {
    // sätt session så man loggar in
    // if()
    // {

    // }
  }

  public function isLoggedIn()
  {
    // kolla session om man verkligen är inloggad
    return false;
  }


}