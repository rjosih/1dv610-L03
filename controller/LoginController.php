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
            $SetCookieNameYesterday = $this->view->SetCookieNameYesterday();
            $SetCookiePasswordYesterday = $this->view->SetCookiePasswordYesterday();
            
            $Welcome = $this->view->Welcome();
            $WelcomeBackWithCookie = $this->view->WelcomeBackWithCookie();
            $WelcomeBackRemembered = $this->view->WelcomeBackRembered();
            $Empty = $this->view->EmptyMessage();
            $ByeBye = $this->view->ByeBye();

            $KeepMeLoggedInButton = $this->view->keepMeLoggedInButton(); 
            $LoginViewLogin = $this->view->LoginViewLogin();
            $LoginViewLogout = $this->view->LoginViewLogout();
            $LogOut = $this->view->logOut();
            $GetRegister = $this->view->getRegister();

            
            // kontollera uppgifterna mot model
            $SessionMessage = $this->model->sessionMessage();
            $SessionUsername = $this->model->sessionUserName();
            $SessionPassword = $this->model->sessionPassword();
            $SessionUsernameIsAdmin = $this->model->sessionUserNameIsAdmin();
            $SessionPasswordIsPassword = $this->model->sessionPasswordIsPassword();
            $IsLoggedIn = $this->model->isLoggedIn();
            $Message = '';
            $Response = '';
            

        

            if($LoginViewCookieName && $LoginViewCookiePassword)
            {
                if(!$SessionUsername || $SessionUsername == $Empty)
                {
                    if($CookieNameIsAdmin && $CookiePasswordIsPassword)
                    {
                        $SessionUsernameIsAdmin;
                        $SessionUsernameIsAdmin;
                        $SessionMessage = $WelcomeBackWithCookie;
                    }
                }
            }
        
            if($LoginViewLogout)
            {   
                if ($SessionUsername && $SessionUsernameIsAdmin) 
                {
                    $SessionMessage = $ByeBye;

                    $this->model->logout();
                    // $SetCookieNameYesterday
                    // $SetCookiePasswordYesterday
                }
                $SessionUsername = $Empty;
            }
            else if($LoginViewLogin)
            {
                if ($this->model->validateInfo($PostUsername, $PostPassword) && $KeepMeLoggedInButton) 
                {
                    $SessionMessage = $WelcomeBackRemembered;
                }
                else if($this->model->validateInfo($PostUsername, $PostPassword))
                {
                    $this->model->login();
                    $SessionMessage = $Welcome;
                }
                else
                {
                    $SessionMessage = $Empty;
                }
            
            }
        
            if ($PostPassword && $PostPassword == "Password"  && $PostUsername && $PostUsername == "Admin")
            {
                $SessionUsername = $PostUsername;
                $SessionPassword = $PostPassword;
                
                if($KeepMeLoggedInButton)
                {
                    setcookie('LoginView::CookieName', $SessionUsername, time() + (86400 * 30), "/" );
                    setcookie('LoginView::CookiePassword', $SessionPassword, time() + (86400 * 30), "/" );
                }
            }
            
            // if($GetRegister)
            // {
            //     if($SessionUsername && $SessionPassword && $SessionUsernameIsAdmin && $SessionPasswordIsPassword)
            //     {
            //         $layoutView->render(true, $registerView, $dtv);
            //     }
            //     else
            //     {
            //         $layoutView->render(false, $registerView, $dtv);
            //     }
            //     } 
            // else 
            //     {
            //         if($SessionUsername && $SessionPassword && $SessionUsernameIsAdmin && $SessionPasswordIsPassword)
            //         {
            //                 $layoutView->render(true, $v, $dtv);
            //         }
            //         else
            //         {
            //             $layoutView->render(false, $v, $dtv);
            //         }
            //     }
            
                return $this->model;
            }
}


			
