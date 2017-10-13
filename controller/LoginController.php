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
            $message = $this->model->getMessage();
            $this->view->setMessage($message);

            // validate info against model
            $SessionMessageEmpty = $this->model->sessionMessage();
            $SessionUsernameEmpty = $this->model->sessionUserNameEmpty();
            $SessionUsername = $this->model->sessionUserName();
            $SessionPassword = $this->model->sessionPassword();
            $SessionUsernameIsAdmin = $this->model->sessionUserNameIsAdmin();
            $SessionPasswordIsPassword = $this->model->sessionPasswordIsPassword();
            
            // using cookies
            if($this->view->LoginViewCookieName() && $this->view->LoginViewCookiePassword())
            {
                if(!$SessionUsername || $SessionUsernameEmpty)
                {
                    if($this->view->CookieNameIsAdmin() && $this->view->CookiePasswordIsPassword())
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
                if($this->view->LoginViewLogin())
                {
                    if ($this->model->validateInfo($this->view->getRequestUserName(), $this->view->postPassword()) && $this->view->keepMeLoggedInButton()) 
                    {
                        $this->model->login();
                        $this->model->WelcomeRemembered();

                        $message = $this->model->getMessage();
                        $this->view->setMessage($message);
                    }
                    else if($this->model->validateInfo($this->view->getRequestUserName(), $this->view->postPassword()))
                    {
                        $this->model->login();

                        $message = $this->model->getMessage();
                        $this->view->setMessage($message);
                    }
                }
            }
            if ($this->view->postPassword() && $this->view->PostPasswordIsPassword()  && $this->view->getRequestUserName() && $this->view->PostUserNameIsAdmin())
            {
                $SessionUsername = $this->view->getRequestUserName();
                $SessionPassword = $this->view->postPassword();
                
                if($this->view->keepMeLoggedInButton())
                {
                    setcookie('LoginView::CookieName', $SessionUsername, time() + (86400 * 30), "/" );
                    setcookie('LoginView::CookiePassword', $SessionPassword, time() + (86400 * 30), "/" );
                }
            }
            if($this->view->LoginViewLogout())
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


			
