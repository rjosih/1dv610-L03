<?php

//INCLUDE THE FILES NEEDED...
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('model/RenderRegisterView.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//CREATE OBJECTS OF THE VIEWS
$LoginView = new LoginView();
$DateTimeView = new DateTimeView();
$LayoutView = new LayoutView();
$registerView = new RegisterView();


$LayoutView->render(false, $LoginView, $DateTimeView);
        
       
if($test)
{
    if($test2)
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
    if($test2)
    {
        $LayoutView->render(true, $LayoutView, $dtv);
    }
    else
    {
        $LayoutView->render(false, $LayoutView, $dtv);
    }
} 