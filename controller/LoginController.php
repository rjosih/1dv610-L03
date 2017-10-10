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

            $keepMeLoggedInButton = $this->view->keepMeLoggedInButton(); 
            $LoginViewLogin = $this->view->LoginViewLogin();
            $LoginViewLogout = $this->view->LoginViewLogout();
            $logOut = $this->view->logOut();
            $getRegister = $this->view->getRegister();

            
            // kontollera uppgifterna mot model
            $this->model->validateInfo($postUsername, $postPassword); 
            $sessionMessage = $this->model->sessionMessage();
            $sessionUsername = $this->model->sessionUserName();
            $sessionPassword = $this->model->sessionPassword();
            $sessionUsernameIsAdmin = $this->model->sessionUserNameIsAdmin();
            $sessionPasswordIsPassword = $this->model->sessionPasswordIsPassword();
            $message = '';
            $response = '';
          
                
            // $response = $this->generateLoginFormHTML($message);
            // $sessionMessage;
            return $this->model;
        }
        
        public function ValidateLoginInput()
        {
            if($LoginViewCookieName && $LoginViewCookiePassword)
            {
                if(!$sessionUsername || $sessionUsername == '')
                {
                    if($LoginViewCookieName == 'Admin' && $LoginViewCookiePassword == 'Password')
                    {
                        $sessionUsernameIsAdmin;
                        $sessionUsernameIsAdmin;
                        $_SESSION['message'] = 'Welcome back with cookie';
                    }
                }
            }
        
        
            if($LoginViewLogout)
            {   
                if (isset($sessionUsername) && $sessionUsernameIsAdmin) 
                {
            
                    $_SESSION['message'] = "Bye bye!";
                    unset($LoginViewCookieName);
                    unset($LoginViewCookiePassword);
                    return $_COOKIE['LoginView::CookieName'];
                    setcookie($LoginViewCookieName, "", time() -3600, "/" );
                    setcookie($LoginViewCookiePassword, "", time() -3600, "/");
                }
                $sessionUsername = '';
            }
                else if($LoginViewLogin)
            {    
                if ($sessionUsername == "" &&  $keepMeLoggedInButton) 
                {
                    $_SESSION['message'] = "Welcome and you will be rembered";
                }
                else if($sessionUsername == "")
                {
                    $_SESSION['message'] = "Welcome";
                }
                else
                {
                    $_SESSION['message'] = "";
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


			
