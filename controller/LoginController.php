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
            // $SetCookieNameYesterday = $this->view->SetCookieNameYesterday();
            // $SetCookiePasswordYesterday = $this->view->SetCookiePasswordYesterday();
            
            $Welcome = $this->view->Welcome();
            $WelcomeBackWithCookie = $this->view->WelcomeBackWithCookie();
            $WelcomeBackRemembered = $this->view->WelcomeBackRembered();
            // $Empty = $this->view->EmptyMessage();
            $ByeBye = $this->view->ByeBye();

            $KeepMeLoggedInButton = $this->view->keepMeLoggedInButton(); 
            $LoginViewLogin = $this->view->LoginViewLogin();
            $LoginViewLogout = $this->view->LoginViewLogout();
            $LogOut = $this->view->logOut();
            $GetRegister = $this->view->getRegister();

            // kontollera uppgifterna mot model
            $SessionMessageEmpty = $this->model->sessionMessage();
            $SessionUsername = $this->model->sessionUserName();
            $SessionUsernameEmpty = $this->model->sessionUserNameEmpty();
            $SessionPassword = $this->model->sessionPassword();
            $SessionUsernameIsAdmin = $this->model->sessionUserNameIsAdmin();
            $SessionPasswordIsPassword = $this->model->sessionPasswordIsPassword();
            $IsLoggedIn = $this->model->isLoggedIn();
            $Message = '';
            $Response = '';
 
            if($LoginViewCookieName && $LoginViewCookiePassword)
            {
                if(!$SessionUsername || $SessionUsernameEmpty)
                {
                    if($CookieNameIsAdmin && $CookiePasswordIsPassword)
                    {
                        $SessionUsernameIsAdmin;
                        $SessionUsernameIsAdmin;
                        $this->model->WelcomeBackCookie();
                    }
                }
            }
        
            if($LoginViewLogout)
            {   
                if ($SessionUsername && $SessionUsernameIsAdmin) 
                {
                    // $_SESSION['message']  = $ByeBye;

                    $this->model->logout();
                    // $SetCookieNameYesterday
                    // $SetCookiePasswordYesterday
                }
                $SessionUsernameEmpty;
            }
            else if($LoginViewLogin)
            {
                if ($this->model->validateInfo($PostUsername, $PostPassword) && $KeepMeLoggedInButton) 
                {
                    $this->model->login();
                    $this->model->WelcomeRemembered();
                }
                else if($this->model->validateInfo($PostUsername, $PostPassword))
                {
                    $this->model->login();
                    $this->model->Welcome();
                    // $SessionMessage = $Welcome;
                }
                else
                {
                    $SessionMessageEmpty;
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
            
            return $this->model;
            }
}


			
