<?php

// require_once('view/DateTimeView.php');
// require_once('view/LayoutView.php');



class RegisterForm{

    private static $UserName = 'RegisterView:UserName';
    private static $Password = 'RegisterView:Password';
    private static $PasswordRepeat = 'RegisterView:PasswordRepeat';
    


    public function renderRegisterForm($message)
    {

        echo '
        <h1>Assignment 2</h1>
        <a href="?">Back to login</a>
        <h2>Not logged in</h2>
        <h2>Register a new user</h2>
        <form method="post" name="form" > 
            <fieldset>
                <legend>Register a new user - Write username and password</legend>
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
        <p>' . $timeString . '</p>;
        ';
//tiden måste visas
    }
}