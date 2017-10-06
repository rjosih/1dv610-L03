<?php

class LoginModel
{
  public $message;
  public function sessionUserName()
  {
    if($_SESSION['Username'])
    {
      return $_SESSION['Username'];
    }
    return "";
  }

  public function sessionUserNameIsAdmin()
  {
    if($_SESSION['Username'] =='Admin')
    {
      return $_SESSION['Username'] =='Admin';
    }
    return "";
  }

  public function sessionPassword()
  {
    if($_SESSION['Password'])
    {
      return $_SESSION['Password'];
    }
    return "";
  }

  public function sessionPasswordIsPassword()
  {
    if($_SESSION['Password'] == 'Password')
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
    else
    {
        $this->message = 'Wrong name or password';
    }
  }
public function login()
{
  // sätt session så man loggar in
}

  public function isLoggedIn()
  {
    // kolla session om man verkligen är inloggad
    return false;
  }
}