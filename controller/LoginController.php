<?php


class LoginController
{
    private $view;
    private $model;
    
        public function __construct()
        {
            $this->view = new LoginView();
            $this->model = new LoginModel();
        }
        
        public function Login() 
        {
            // kontollera uppgifterna mot view
            $postPassword = $this->view->postPassword();
            $postUsername = $this->view->getRequestUserName();

            $LoginViewCookieName = $this->view->LoginViewCookieName();
            $LoginViewCookiePassword = $this->view->LoginViewCookiePassword();

            $CookieNameIsAdmin = $this->view->CookieNameIsAdmin();
            $CookiePasswordIsPassword = $this->view->CookiePasswordIsPassword();
            $SetCookieNameYesterday = $this->view->SetCookieNameYesterday();
            $SetCookiePasswordYesterday = $this->view->SetCookiePasswordYesterday();
            
            $Welcome = $this->view->Welcome();
            $WelcomeBackWithCookie = $this->view->WelcomeBackWithCookie();
            $WelcomeBackRemembered = $this->view->WelcomeBackRembered();
            $Empty = $this->view->EmptyMessage();
            $ByeBye = $this->view->ByeBye();

            $keepMeLoggedInButton = $this->view->keepMeLoggedInButton(); 
            $LoginViewLogin = $this->view->LoginViewLogin();
            $LoginViewLogout = $this->view->LoginViewLogout();
            $logOut = $this->view->logOut();
            $getRegister = $this->view->getRegister();

            
            // kontollera uppgifterna mot model
            $this->model->validateInfo($postUsername, $postPassword); 
            $SessionMessage = $this->model->sessionMessage();
            $sessionUsername = $this->model->sessionUserName();
            $sessionPassword = $this->model->sessionPassword();
            $sessionUsernameIsAdmin = $this->model->sessionUserNameIsAdmin();
            $sessionPasswordIsPassword = $this->model->sessionPasswordIsPassword();
            $message = '';
            $response = '';
            
            return $this->model;
        }
        
        public function ValidateLoginInput()
        {
            if($LoginViewCookieName && $LoginViewCookiePassword)
            {
                if(!$sessionUsername || $sessionUsername == $Empty)
                {
                    if($CookieNameIsAdmin && $CookiePasswordIsPassword)
                    {
                        $sessionUsernameIsAdmin;
                        $sessionUsernameIsAdmin;
                        $SessionMessage = $WelcomeBackWithCookie;
                    }
                }
            }
        
        
            if($LoginViewLogout)
            {   
                if (isset($sessionUsername) && $sessionUsernameIsAdmin) 
                {
                    $SessionMessage = $ByeBye;
                    unset($LoginViewCookieName);
                    unset($LoginViewCookiePassword);
                    $SetCookieNameYesterday
                    $SetCookiePasswordYesterday
                }
                $sessionUsername = $Empty;
            }
                else if($LoginViewLogin)
            {    
                if ($sessionUsername == $Empty &&  $keepMeLoggedInButton) 
                {
                    $SessionMessage = $WelcomeBackRemembered;
                }
                else if($sessionUsername == $Empty)
                {
                    $SessionMessage = $Welcome;
                }
                else
                {
                    $SessionMessage = $Empty;
                }
            
            }
        
            if (isset($postPassword) && $postPassword == "Password"  && (isset($postUsername) && $postUsername == "Admin"))
            {
                
                $sessionUsername = $postUsername;
                $sessionPassword = $postPassword;
                
                if($keepMeLoggedInButton)
                {
                    setcookie('LoginView::CookieName', $sessionUsername, time() + (86400 * 30), "/" );
                    setcookie('LoginView::CookiePassword', $sessionPassword, time() + (86400 * 30), "/" );
                }
            }
            
            if($getRegister)
            {
                if($sessionUsername && $sessionPassword && $sessionUsernameIsAdmin && $sessionPasswordIsPassword)
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
                    if($sessionUsername && $sessionPassword && $sessionUsernameIsAdmin && $sessionPasswordIsPassword)
                    {
                            $layoutView->render(true, $v, $dtv);
                    }
                    else
                    {
                        $layoutView->render(false, $v, $dtv);
                    }
                }
        
        
        }
}


			
