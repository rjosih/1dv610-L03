<?php

session_start();

//include needed files
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/WeekendView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('model/LoginModel.php');
require_once('model/WeekendModel.php');
require_once('controller/LoginController.php');
require_once('controller/WeekendController.php');

// create objects of the view
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
