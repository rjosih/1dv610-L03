<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView();



// om båda inputfälten är korrekt ifyllda med Admin och Password

if (isset($_POST['LoginView::Password']) && $_POST['LoginView::Password'] == "Password"  && (isset($_POST['LoginView::UserName']) && $_POST['LoginView::UserName'] == "Admin"))
{
    //sätter sessioner
    $_SESSION['Username'] = $_POST['LoginView::UserName'];
    $_SESSION['Password'] = $_POST['LoginView::Password'];

}


if(isset($_POST['LoginView::Logout']))
{
    unset($_SESSION['Username']);  
}
else if(isset($_POST['LoginView::Login']))
{
    // kolla om man har rätt username och password
    // om rätt, spara i session
    // om fel, spara inte och visa felmeddelande "wrong name etc"
    // $_SESSION['Username'] = $_POST['LoginView::Login'];
    
    
}


if(isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
{
    $lv->render(true, $v, $dtv);
}
else
{
    $lv->render(false, $v, $dtv);
}
