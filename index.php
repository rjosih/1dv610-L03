<?php

session_start();

$_SESSION['message'] = '';
if (!isset($_SESSION['Username'])) {
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
$lv = new LayoutView();



if(isset($_POST['LoginView::Logout']))
{
    if (isset($_SESSION['Username']) && $_SESSION['Username'] == "Admin") {
        $_SESSION['message'] = "Bye bye!";
    }
    $_SESSION['Username'] = '';
}
else if(isset($_POST['LoginView::Login']))
{    
    if ($_SESSION['Username'] == "") {
        $_SESSION['message'] = "Welcome";
    }
}



// om båda inputfälten är korrekt ifyllda med Admin och Password

if (isset($_POST['LoginView::Password']) && $_POST['LoginView::Password'] == "Password"  && (isset($_POST['LoginView::UserName']) && $_POST['LoginView::UserName'] == "Admin"))
{
    //sätter sessioner
    $_SESSION['Username'] = $_POST['LoginView::UserName'];
    $_SESSION['Password'] = $_POST['LoginView::Password'];
}

if (isset($_GET['register'])) {
    if(isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
    {
        $lv->render(true, $registerView, $dtv);
    }
    else
    {
        $lv->render(false, $registerView, $dtv);
    }
} else {
    if(isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
    {
        $lv->render(true, $v, $dtv);
    }
    else
    {
        $lv->render(false, $v, $dtv);
    }
}

