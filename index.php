<?php

session_start();

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/WeekendView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('model/LoginModel.php');
require_once('model/WeekendModel.php');
require_once('controller/LoginController.php');
require_once('controller/WeekendController.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$LoginView = new LoginView();
$DateTimeView = new DateTimeView();
$LayoutView = new LayoutView();
$registerView = new RegisterView();
$LoginController = new LoginController();

$model = $LoginController->Login();

$isLoggedIn = false;


if ($LayoutView->getRegisterView()) 
{
    $LayoutView->render($model, $registerView, $DateTimeView);
}
else
{
    $LayoutView->render($model, $LoginView, $DateTimeView);
}
