<?php



class RegisterView {

    private static $UserName = 'RegisterView::UserName';
    private static $Password = 'RegisterView::Password';
    private static $PasswordRepeat = 'RegisterView::PasswordRepeat';
    private static $MessageInRegister = 'RegisterView::Message';
    private static $DoRegistration = 'RegisterView::DoRegistration';

    public function response()
    {
        $response = '';
        $SamePassword = '';
        $MessageInRegister = '';

        if(isset($_POST[self::$DoRegistration]))
        {
            if(strlen($_POST[self::$UserName]) < 3)
            {
                $MessageInRegister .= "Username has too few characters, at least 3 characters." . "<br>";
            }

            if(strlen($_POST[self::$Password]) < 6)
            {
                $MessageInRegister .= "Password has too few characters, at least 6 characters.";
            }
            else if($_POST[self::$Password] != $_POST[self::$PasswordRepeat])
            {
                $MessageInRegister .= "Passwords do not match.";
            }
        }

        $response = $this->generateMessage($MessageInRegister);
        // $_SESSION['Msg'] = '';
        // $_SESSION['SamePassword'] = '';
        return $response;
    }

    private function generateMessage($MessageInRegister)
    {
        return '
        <h2>Register a new user</h2>
        <form action="?register" method="post" name="form">
            <fieldset>
                <legend>Register a new user - Write username and password</legend>
               
                <p id="' . self::$MessageInRegister . '">' . $MessageInRegister .  '</p>
                <br>

                <label for=' . self::$UserName . '>Username :</label>
                <input type="text" size="20" id="' . self::$UserName . '" name="' . self::$UserName . '" value=""/>
                <br>

                <label for=' . self::$Password . '>Password :</label>
                <input type="password" size="20" id="' . self::$Password . '" name="' . self::$Password . '" value="" />
                <br>

                <label for=' . self::$PasswordRepeat . '>Repeat password :</label>
                <input type="password" size="20" id="' . self::$PasswordRepeat . '" name="' . self::$PasswordRepeat . '" value=""/>
                <br>
                
                <input id="submit" type="submit" name=' . self::$DoRegistration . '  value="Register" />

            </fieldset>
        </form>
        ';
    }
    
}