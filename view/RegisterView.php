<?php



class RegisterView {

    private static $UserName = 'RegisterView:UserName';
    private static $Password = 'RegisterView:Password';
    private static $PasswordRepeat = 'RegisterView:PasswordRepeat';
    private static $MessageInRegister = 'RegisterView::Message';
    private static $DoRegistration = 'RegisterView::DoRegistration';

    public function response()
    {
        $MessageInRegister = '';
        $response = '';
        $SamePassword = '';

    if(isset($_POST[self::$DoRegistration]))
    {
        if($_POST[strlen(self::$UserName)] < 3)
        {
            $MessageInRegister = "Username has too few characters, at least 3 characters.";
        }
        else if($_POST[strlen(self::$Password)] < 6 || strlen(self::$PasswordRepeat) < 6)
        {
            $MessageInRegister = "Password has too few characters, at least 6 characters.";
        }
    }
    // if(self)
    // {

    // }
        $response = $this->generateMessage($MessageInRegister) && $this->generateMessage($SamePassword);
        $_SESSION['MessageInRegister'] = '';
        // $_SESSION['SamePassword'] = '';
        return $response;
    }

    private function generateMessage($MessageInRegister)
    {
        return '
        <h2>Register a new user</h2>
        <form method="post" name="form" > 
            <fieldset>
                <legend>Register a new user - Write username and password</legend>
               
    
                <p id="' . self::$MessageInRegister . '">' . $MessageInRegister . $_SESSION['MessageInRegister'] .  '</p>
                
            
                <br>
                <label for=' . self::$UserName . '>Username :</label>
                <input type="text" size="20"/>
                <br>

                <label for=' . self::$Password . '>Password :</label>
                <input type="password" size="20" />
                <br>

                <label for=' . self::$PasswordRepeat . '>Repeat password :</label>
                <input type="password" size="20"/>
                <br>
                
                <input id="submit" type="submit" name=' . self::$DoRegistration . '  value="Register" />

            </fieldset>
        </form>
        ';
    }
    
}