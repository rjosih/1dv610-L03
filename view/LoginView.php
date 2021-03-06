<?php

class LoginView 
{
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private $message = "";

	public function response(LoginModel $model)
	{
		if($model->isLoggedIn()) 
		{
			// $this->getTime();
			return $this->generateLogoutButtonHTML($model->message);
		}
		else { 
			$message = '';
			return $this->generateLoginFormHTML($model->message);
		}
	}
	private function generateLogoutButtonHTML($message) 
	{
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	private function generateLoginFormHTML($message) 
	{
		return '
		<br>
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="'  . $this->getRequestUserName() .  '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	public function setMessage($message)
	{
		$this->message = $message;
	}
	public function getRequestUserName() 
	{
		if(isset($_POST[self::$name]))
		{
			return $_POST[self::$name];
		}
		return "";
	}

	public function postPassword()
	{
		if(isset($_POST[self::$password]))
		{
			return $_POST[self::$password];
		}
		return "";
	}

	public function logOut()
	{
		if(isset($_POST['LoginView::Logout']))
		{
			return $_POST['LoginView::Logout'];
		}
		return "";
	}

	public function CookieNameIsAdmin()
	{
		if(isset($_COOKIE['LoginView::CookieName']))
		{
			return $_COOKIE['LoginView::CookieName'] == 'Admin';
		}
		return "";
	}

	public function CookiePasswordIsPassword()
	{
		if(isset($_COOKIE['LoginView::CookiePassword']))
		{
			return  $_COOKIE['LoginView::CookiePassword'] == 'Password';
		}
		return "";
	}

	public function LoginViewCookieName()
	{
		if(isset($_COOKIE['LoginView::CookieName']))
		{
			return $_COOKIE['LoginView::CookieName'];
		}
		return "";
	}

	public function LoginViewCookiePassword()
	{
		if(isset($_COOKIE['LoginView::CookiePassword']))
		{
			return $_COOKIE['LoginView::CookiePassword'];
		}
		return "";
	}

	
	public function getRegister()
	{
		if(isset($_GET['register']))
		{
			return $_GET['register'];
		}
		return "";
	}
	
	public function keepMeLoggedInButton()
	{
		if(isset($_POST['LoginView::KeepMeLoggedIn']))
		{
			return $_POST['LoginView::KeepMeLoggedIn'];
		}
		return "";
	}

	public function LoginViewLogin()
	{
		if(isset($_POST['LoginView::Login']))
		{
			return true;
		}
		return false;
	}
	
	public function LoginViewLogout()
	{
		if(isset($_POST['LoginView::Logout']))
		{
			return $_POST['LoginView::Logout'];
		}
		return "";
	}
	
	public function PostPasswordIsPassword()
	{
		if(isset($_POST[self::$password]) == 'Password')
		{
			return true;
		}
		return false;
	}
	
	public function PostUsernameIsAdmin()
	{
		if(isset($_POST[self::$name]) == 'Admin')
		{
			return true;
		}
		return false;
	}

	public function setCookiesYesterday()
	{
		setcookie("LoginView::CookieName", "", time() -3600, "/" );
		setcookie("LoginView::CookiePassword", "", time() -3600, "/" );
	}

}