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

  public function sessionUserNameEmpty()
  {
    if(isset($_SESSION['Username']) == '')
    {
      return true;
    }
    return false;
  }

  public function sessionUserNameIsAdmin()
  {
    if(isset($_SESSION['Username']) && $_SESSION['Username'] =='Admin')
    {
      return true;
    }
    return false;
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
      return true;
    }
    return false;
  }

  public function sessionMessage()
  {
    if(isset($_SESSION['message']) == '')
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
    else if($postUsername !== 'Admin' || $postPassword !== 'Password')
    {
       $this->message = 'Wrong name or password';
    }
    else
    {
        $this->message = '';
        return true;
    }
  }

  public function login()
  {
    $_SESSION['Username'] = 'Admin';
    $_SESSION['Password'] = 'Password';
    $this->message = "Welcome";
  }

  public function logout()
  {
    unset($_SESSION['Username']);
    unset($_SESSION['Password']);
    $this->message = "Bye bye!";
  }

  public function isLoggedIn()
  {
    if($this->sessionUserNameIsAdmin() && $this->sessionPasswordIsPassword())
    {
      return true;
    }
    return false;
  }

  public function WelcomeBackCookie()
  {
    $_SESSION['Username'] = 'Admin';
    $_SESSION['Password'] = 'Password';
    $this->message = "Welcome back with cookie";
  }

  public function WelcomeRemembered()
  {
    $this->message = "Welcome and you will be remembered";
  }

}