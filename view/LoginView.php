<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	public static $usernameInInput = '';

	

	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() 
	{
		$message = '';
		$response = '';
		
		//om man loggar ut 
		if(isset($_POST['LoginView::Logout'])) 
		{
			// $message = "Bye bye!";
			$message = '';
			return $this->generateLoginFormHTML($message);
		}

		// if (isset($_POST['LoginView::Login'])) {
			// om man inte har rätt inlogg med båda inputfälten ifyllda
			if (isset($_SESSION['Username']) && isset($_SESSION['Password']) && $_SESSION['Password'] == 'Password' && $_SESSION['Username'] =='Admin')
			{
				if (isset($_POST['LoginView::Login'])) 
				{
					// $message = 'Welcome';
				}
				
				return $this->generateLogoutButtonHTML($message);
			}
			// kollar om inputfälten är ifyllda
			else if(isset($_POST[self::$name]) || isset($_POST[self::$password])) 
			{
				if($_POST[self::$name] == '')
				{
					$message = 'Username is missing';
				}
				else if($_POST[self::$password] == '')
				{
					$message = 'Password is missing';
					
				}
				else
				//om 
				{
					$message = 'Wrong name or password';
				}
			}
		// }
		$response = $this->generateLoginFormHTML($message);
		$_SESSION['message'] = '';
		return $response;
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
				<p id="' . self::$messageId . '">' . $message . $_SESSION['message'] . '</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
		
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {

		if ($message == "Username is missing" || $message == "Password is missing" || $message == "Wrong name or password") 
		{
			if ($_SESSION['message'] == "Welcome") {
				$_SESSION['message'] = "";
			}
		}

		return '
			<form method="post" name="form" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					
					
					<p id="' . self::$messageId . '">' . $message . $_SESSION['message'] . '</p>
					
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
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() 
	{

		//RETURN REQUEST VARIABLE: USERNAME
		if(isset($_POST[self::$name]))
		{

			return $_POST[self::$name];
		}

		return "";

	}
	
}