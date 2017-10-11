<?php

// class Functions 
// {    
//     public function postPassword()
//     {
//         if(isset($_POST[self::$password]))
//         {
//             return isset($_POST[self::$password]);
//         }
//         return "";
//     }
    
//     public function logOut()
//     {
//         if(isset($_POST['LoginView::Logout']))
//         {
//             return $_POST['LoginView::Logout'];
//         }
//         return "";
//     }
    
//     public function setCookieName()
//     {
//         if(setcookie('LoginView::CookieName', $_SESSION['Username'], time() + (86400 * 30), "/" ))
//         {
//             return setcookie('LoginView::CookieName', $_SESSION['Username'], time() + (86400 * 30), "/" );
//         }
//         return "";
//     }
    
//     public function setCookiePassword()
//     {
//         if(setcookie('LoginView::CookiePassword', $_SESSION['Password'], time() + (86400 * 30), "/" ))
//         {
//             return setcookie('LoginView::CookiePassword', $_SESSION['Password'], time() + (86400 * 30), "/" );
//         }
//         return "";
//     }
    
//     public function LoginViewCookieName()
//     {
//         if(isset($_COOKIE['LoginView::CookieName']))
//         {
//             return $_COOKIE['LoginView::CookieName'];
//         }
//         return "";
//     }
    
//     public function LoginViewCookiePassword()
//     {
//         if(isset($_COOKIE['LoginView::CookiePassword']))
//         {
//             return $_COOKIE['LoginView::CookiePassword'];
//         }
//         return "";
//     }
    
//     public function setCookieNameYesterday()
//     {
//         if(setcookie("LoginView::CookieName", "", time() -3600, "/" ))
//         {
//             return setcookie("LoginView::CookieName", "", time() -3600, "/" );
//         }
//         return "";
//     }
    
//     public function setCookiePasswordYesterday()
//     {
//         if(setcookie("LoginView::CookiePassword", "", time() -3600, "/" ))
//         {
//             return setcookie("LoginView::CookiePassword", "", time() -3600, "/" );
//         }
//         return "";
//     }
    
//     public function getRegister()
//     {
//         if(isset($_GET['register']))
//         {
//             return $_GET['register'];
//         }
//         return "";
//     }
    
//     public function keepMeLoggedInButton()
//     {
//         if(isset($_POST['LoginView::KeepMeLoggedIn']))
//         {
//             return $_POST['LoginView::KeepMeLoggedIn'];
//         }
//         return "";
//     }
    
//     public function LoginViewLogin()
//     {
//         if(isset($_POST['LoginView::Login']))
//         {
//             return $_POST['LoginView::Login'];
//         }
//         return "";
//     }
    
//     public function LoginViewLogout()
//     {
//         if(isset($_POST['LoginView::Logout']))
//         {
//             return $_POST['LoginView::Logout'];
//         }
//         return "";
//     }
//     public function WelcomeBackWithCookie()
//     {
//         return "Welcome back with cookie";
//     }
//     public function WelcomeBackRembered()
//     {
//         return "Welcome back and you will be rembered";
//     }
//     public function Welcome()
//     {
//         return "Welcome";
//     }
//     public function EmptyMessage()
//     {
//         return "";
//     }
//     public function ByeBye()
//     {
//         return "Bye bye!";
//     }
// }