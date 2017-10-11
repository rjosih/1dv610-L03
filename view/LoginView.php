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


	public function response(LoginModel $model)
	{
		if($model->isLoggedIn()) 
		{
			return $this->generateLogoutButtonHTML($model->message);
		}
		else { 
			$message = '';
			return $this->generateLoginFormHTML($model->message);
		}
	}
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) 
	{
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
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
			return isset($_POST[self::$password]);
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

	public function setCookieName()
	{
		if(setcookie('LoginView::CookieName', $_SESSION['Username'], time() + (86400 * 30), "/" ))
		{
			return setcookie('LoginView::CookieName', $_SESSION['Username'], time() + (86400 * 30), "/" );
		}
		return "";
	}

	public function setCookiePassword()
	{
		if(setcookie('LoginView::CookiePassword', $_SESSION['Password'], time() + (86400 * 30), "/" ))
		{
			return setcookie('LoginView::CookiePassword', $_SESSION['Password'], time() + (86400 * 30), "/" );
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

	public function setCookieNameYesterday()
	{
		if(setcookie("LoginView::CookieName", "", time() -3600, "/" ))
		{
			return setcookie("LoginView::CookieName", "", time() -3600, "/" );
		}
		return "";
	}

	public function setCookiePasswordYesterday()
	{
		if(setcookie("LoginView::CookiePassword", "", time() -3600, "/" ))
		{
			return setcookie("LoginView::CookiePassword", "", time() -3600, "/" );
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
			return $_POST['LoginView::Login'];
		}
		return "";
	}

	public function LoginViewLogout()
	{
		if(isset($_POST['LoginView::Logout']))
		{
			return $_POST['LoginView::Logout'];
		}
		return "";
	}
	public function WelcomeBackWithCookie()
	{
		return "Welcome back with cookie";
	}
	public function WelcomeBackRembered()
	{
		return "Welcome back and you will be rembered";
	}
	public function Welcome()
	{
		return "Welcome";
	}
	public function EmptyMessage()
	{
		return "";
	}
	public function ByeBye()
	{
		return "Bye bye!";
	}
}