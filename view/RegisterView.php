<?php

// require_once('view/DateTimeView.php');
// require_once('view/LayoutView.php');



class RegisterView {

    private static $UserName = 'RegisterView:UserName';
    private static $Password = 'RegisterView:Password';
    private static $PasswordRepeat = 'RegisterView:PasswordRepeat';
    private static $MessageInRegister = 'RegisterView::Message';
    


    public function response()
    {

        return '
        <h2>Register a new user</h2>
        <form method="post" name="form" > 
            <fieldset>
                <legend>Register a new user - Write username and password</legend>
                <p id="RegisterView::Message"></p>
            
                <br>
                <label for=' . self::$UserName . '>Username :</label>
                <input type="text" size="20"/>
                <br>

                <label for=' . self::$Password . '>Password :</label>
                <input type="password" size="20"/>
                <br>

                <label for=' . self::$PasswordRepeat . '>Repeat password :</label>
                <input type="password" size="20"/>
                <br>
                
                <input id="submit" type="submit" name="DoRegistration"  value="Register" />

            </fieldset>
        </form>
        ';
//tiden måste visas
    }
}