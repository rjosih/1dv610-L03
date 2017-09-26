<?php

session_start();

$_SESSION['message'] = '';
    
if (!isset($_SESSION['Username'])) 
    {
        $_SESSION['Username'] = '';
    }

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/RegisterView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView();
$registerView = new RegisterView();
$dtv = new DateTimeView();
$layoutView = new LayoutView();

    if(isset($_COOKIE['LoginView::CookieName']) && isset($_COOKIE['LoginView::CookiePassword']))
    {
        if(!isset($_SESSION['Username']) || $_SESSION['Username'] == '')
        {
            if($_COOKIE['LoginView::CookieName'] == 'Admin' && $_COOKIE['LoginView::CookiePassword'] == 'Password')
            {
                $_SESSION['Username'] = 'Admin';
                $_SESSION['Password'] = 'Password';
                $_SESSION['message'] = 'Welcome back with cookie';
            }
        }
    }


    if(isset($_POST['LoginView::Logout']))
    {   
        if (isset($_SESSION['Username']) && $_SESSION['Username'] == "Admin") 
        {
    
            $_SESSION['message'] = "Bye bye!";
            unset($_COOKIE['LoginView::CookieName']);
            unset($_COOKIE['LoginView::CookiePassword']);
            setcookie("LoginView::CookieName", "", time() -3600, "/" );
            setcookie("LoginView::CookiePassword", "", time() -3600, "/");
        }
        $_SESSION['Username'] = '';
    }
        else if(isset($_POST['LoginView::Login']))
    {    
        if ($_SESSION['Username'] == "" &&  isset($_POST['LoginView::KeepMeLoggedIn'])) 
        {
            $_SESSION['message'] = "Welcome and you will be rembered";
        }
        else if($_SESSION['Username'] == "")
        {
            $_SESSION['message'] = "Welcome";
        }
        else
        {
            $_SESSION['message'] = "";
        }
    
    }
        

if (isset($_POST['LoginView::Password']) && $_POST['LoginView::Password'] == "Password"  && (isset($_POST['LoginView::UserName']) && $_POST['LoginView::UserName'] == "Admin"))
{
   
    $_SESSION['Username'] = $_POST['LoginView::UserName'];
    $_SESSION['Password'] = $_POST['LoginView::Password'];
    
    if(isset($_POST['LoginView::KeepMeLoggedIn']))
    {
        setcookie('LoginView::CookieName', $_SESSION['Username'], time() + (86400 * 30), "/" );
        setcookie('LoginView::CookiePassword', $_SESSION['Password'], time() + (86400 * 30), "/" );
    }
}

if(isset($_GET['register']) || isset($_GET['?register']))
{
    if(isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
    {
        $layoutView->render(true, $registerView, $dtv);
    }
    else
    {
        $layoutView->render(false, $registerView, $dtv);
    }
    } 
else 
    {
        if(isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
        {
                $layoutView->render(true, $v, $dtv);
        }
        else
        {
            $layoutView->render(false, $v, $dtv);
        }
    }

