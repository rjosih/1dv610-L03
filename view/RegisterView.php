<?php



class RegisterView {

    private static $UserName = 'RegisterView:UserName';
    private static $Password = 'RegisterView:Password';
    private static $PasswordRepeat = 'RegisterView:PasswordRepeat';
    private static $MessageInRegister = 'RegisterView::Message';
    private static $DoRegistration = 'RegisterView::DoRegistration';

    public function response()
    {
        $response = '';
        $SamePassword = '';
        $Msg = '';

        if(isset($_POST[self::$DoRegistration]))
        {
            if(strlen($_POST[self::$UserName]) < 3)
            {
                $Msg .= "Username has too few characters, at least 3 characters." . "<br>";
            }

            if(strlen($_POST[self::$Password]) < 6)
            {
                $Msg .= "Password has too few characters, at least 6 characters.";
            }
            else if($_POST[self::$Password] != $_POST[self::$PasswordRepeat])
            {
                $Msg .= "Passwords do not match.";
            }
        }

        $response = $this->generateMessage($Msg);
        // $_SESSION['Msg'] = '';
        // $_SESSION['SamePassword'] = '';
        return $response;
    }

    private function generateMessage($Msg)
    {
        return '
        <h2>Register a new user</h2>
        <form method="post" name="form" > 
            <fieldset>
                <legend>Register a new user - Write username and password</legend>
               
    
                <p id="' . self::$MessageInRegister . '">' . $Msg .  '</p>
                
            
                <br>
                <label for=' . self::$UserName . '>Username :</label>
                <input type="text" size="20" id="' . self::$UserName . '" name="' . self::$UserName . '" />
                <br>

                <label for=' . self::$Password . '>Password :</label>
                <input type="password" size="20" id="' . self::$Password . '" name="' . self::$Password . '" />
                <br>

                <label for=' . self::$PasswordRepeat . '>Repeat password :</label>
                <input type="password" size="20" id="' . self::$PasswordRepeat . '" name="' . self::$PasswordRepeat . '" />
                <br>
                
                <input type="submit" name=' . self::$DoRegistration . '  value="Register" />

            </fieldset>
        </form>
        ';
    }
    
}