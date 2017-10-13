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
            $PostPassword = $this->view->postPassword();
            $PostUsername = $this->view->getRequestUserName();

            $LoginViewCookieName = $this->view->LoginViewCookieName();
            $LoginViewCookiePassword = $this->view->LoginViewCookiePassword();

            $CookieNameIsAdmin = $this->view->CookieNameIsAdmin();
            $CookiePasswordIsPassword = $this->view->CookiePasswordIsPassword();
            $PostUsernameIsAdmin = $this->view->PostUserNameIsAdmin();
            $PostPasswordIsPassword = $this->view->PostPasswordIsPassword();
    
            $KeepMeLoggedInButton = $this->view->keepMeLoggedInButton(); 
            $LoginViewLogin = $this->view->LoginViewLogin();
            $LoginViewLogout = $this->view->LoginViewLogout();
            $LogOut = $this->view->logOut();
            $GetRegister = $this->view->getRegister();

            $message = $this->model->getMessage();
            $this->view->setMessage($message);

            // kontollera uppgifterna mot model
            $SessionMessageEmpty = $this->model->sessionMessage();
            $SessionUsernameEmpty = $this->model->sessionUserNameEmpty();
            $SessionUsername = $this->model->sessionUserName();
            $SessionPassword = $this->model->sessionPassword();
            $SessionUsernameIsAdmin = $this->model->sessionUserNameIsAdmin();
            $SessionPasswordIsPassword = $this->model->sessionPasswordIsPassword();
            
            // using cookies
            if($LoginViewCookieName && $LoginViewCookiePassword)
            {
                if(!$SessionUsername || $SessionUsernameEmpty)
                {
                    if($CookieNameIsAdmin && $CookiePasswordIsPassword)
                    {
                        $SessionUsernameIsAdmin;
                        $SessionUsernameIsAdmin;
                        $this->model->WelcomeBackCookie();
                      
                        $message = $this->model->getMessage();
                        $this->view->setMessage($message);
                        
                    }
                }
            }
       
            if(!$this->model->isLoggedIn())
            {
                if($LoginViewLogin)
                {
                    if ($this->model->validateInfo($PostUsername, $PostPassword) && $KeepMeLoggedInButton) 
                    {
                        $this->model->login();
                        $this->model->WelcomeRemembered();

                        $message = $this->model->getMessage();
                        $this->view->setMessage($message);
                    }
                    else if($this->model->validateInfo($PostUsername, $PostPassword))
                    {
                        $this->model->login();

                        $message = $this->model->getMessage();
                        $this->view->setMessage($message);
                    }
                }
            }
            if ($PostPassword && $PostPasswordIsPassword  && $PostUsername && $PostUsernameIsAdmin)
            {
                $SessionUsername = $PostUsername;
                $SessionPassword = $PostPassword;
                
                if($KeepMeLoggedInButton)
                {
                    setcookie('LoginView::CookieName', $SessionUsername, time() + (86400 * 30), "/" );
                    setcookie('LoginView::CookiePassword', $SessionPassword, time() + (86400 * 30), "/" );
                }
            }
            if($LoginViewLogout)
            {   
                if ($SessionUsername && $SessionUsernameIsAdmin) 
                {
                    $this->view->setCookiesYesterday();
                    $this->model->logout();

                    $message = $this->model->getMessage();
                    $this->view->setMessage($message);
                }
                $SessionUsernameEmpty;
            }
        
            return $this->model;
            }
}


			
