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
            // kontollera om man tryckt på Loginknappen
            //loginView
            $postPassword = $this->view->postPassword();
            $postUsername = $this->view->getRequestUserName();
            
            // kontollera uppgifterna mot model
            $this->model->validateInfo($postUsername, $postPassword);
            
            
            // $logOut = $this->view->logOut();
            // $sessionMessage = $this->view->sessionMessage();
            // $sessionUsername = $this->view->sessionUserName();
            // $sessionPassword = $this->view->sessionPassword();
            // $sessionUsernameIsAdmin = $this->view->sessionUserNameIsAdmin();
            // $sessionPasswordIsPassword = $this->view->sessionPasswordIsPassword();
            // $message = '';
            // $response = '';
          
                
            // $response = $this->generateLoginFormHTML($message);
            // $sessionMessage;
            return $this->model;
        }
}


			
