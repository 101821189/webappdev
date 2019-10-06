<?php
    if (isset($_POST["email"], $_POST["password"]))
        Process($_POST["email"], $_POST["password"]);
    else
        DisplayForm();

    function DisplayForm($email="")
    {
        echo '<form action="login.php" method="post">';
        echo '    <fieldset>';
        echo '        <legend>enter your login credentials</legend>';
        echo '        <table>';
        echo '            <tr>';
        echo '                <td><label for="email">email:</label></td>';
        echo '                <td><input type="text" name="email" id="email" value="'.$email.'" /></td>';
        echo '            </tr>';
        echo '            <tr>';
        echo '                <td><label for="password">password:</label></td>';
        echo '                <td><input type="password" name="password" id="password" /></td>';
        echo '            </tr>';
        echo '        </table>';
        echo '        <input type="reset" value="reset" class="formButtons btn btn-secondary" />';
        echo '        <input type="submit" value="login" class="formButtons btn btn-primary" />';
        echo '    </fieldset>';
        echo '    </form>';
    }

    function Process($email, $password)
    {
        // check that the input from the user is correct
        $check = ValidateInput($email, $password);
        if ($check != "")
        {
            // display errors and put the previous data into the form
            echo "<p id='errors'>$check</p>";
            DisplayForm($email);
            return;
        }
        
        // now we can assume that the user has entered the correct username and password
        $_SESSION["email"] = $email; // only ever set when the user is logged in
        header("Location:friendadd.php");
    }

    function ValidateInput($email, $password)
    {
        $error = "";

        // check that the fields are not empty
        if ($email == "")
            $error .= "please enter an email<br />";
        
        if ($password == "")
            $error .= "please enter a password<br />";

        // early return if any of the fields are empty
        if ($error != "")
            return $error;

        // check if it's even a valid login
        include "dbconnect.php";
        $query = "SELECT * FROM friends WHERE friend_email='$email' AND password='$password'";
        if ($conn->query($query)->num_rows == 0)
            $error .= "no user found<br />";

        return $error;
    }
?>