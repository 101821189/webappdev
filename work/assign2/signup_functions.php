<?php
    if (isset($_POST["email"], $_POST["profilename"], $_POST["password"], $_POST["confirmpassword"]))
        Process($_POST["email"], $_POST["profilename"], $_POST["password"], $_POST["confirmpassword"]);
    else
        DisplayForm();

    function DisplayForm($email="", $profilename="")
    {
        echo '<form action="signup.php" method="post">';
        echo '    <fieldset>';
        echo '        <legend>create a user account</legend>';
        echo '        <table>';
        echo '            <tr>';
        echo '                <td><label for="email">email:</label></td>';
        echo '                <td><input type="text" name="email" id="email" value="'.$email.'" /></td>';
        echo '            </tr>';
        echo '            <tr>';
        echo '                <td><label for="profilename">profile name:</label></td>';
        echo '                <td><input type="text" name="profilename" id="profilename" value="'.$profilename.'"/></td>';
        echo '            </tr>';
        echo '            <tr>';
        echo '                <td><label for="password">password:</label></td>';
        echo '                <td><input type="password" name="password" id="password" /></td>';
        echo '            </tr>';
        echo '           <tr>';
        echo '                <td><label for="confirmpassword">confirm password:</label></td>';
        echo '                <td><input type="password" name="confirmpassword" id="confirmpassword" /></td>';
        echo '            </tr>';
        echo '        </table>';
        echo '        <input type="reset" value="reset" class="formButtons btn btn-secondary" />';
        echo '        <input type="submit" value="register" class="formButtons btn btn-primary" />';
        echo '    </fieldset>';
        echo '    </form>';
    }

    function Process($email, $profilename, $password, $confirmpassword)
    {
        // initially we want to check for any errors
        $check = ValidateInput($email, $profilename, $password, $confirmpassword);
        if ($check != "")
        {
            // display errors and put the previous data into the form
            echo "<p id='errors'>$check</p>";
            DisplayForm($email, $profilename);
            return;
        }

        // we can now safely assume that the data is valid
        AddUser($email, $profilename, $password);
        $_SESSION["email"] = $email; // will only ever be set if there is an active loggged in session
        header("Location:friendadd.php");
    }

    function ValidateInput($email, $profilename, $password, $confirmpassword)
    {
        $error = "";

        // check that fields are not empty
        if ($email == "")
            $error .= "email cannot be empty<br />";

        if ($profilename == "")
            $error .= "profile name cannot be empty<br />";

        if ($password == "")
            $error .= "password cannot be empty<br />";

        if ($confirmpassword == "")
            $error .= "confirm password cannot be empty<br />";

        // an early return if any of the fields are empty
        if ($error != "")
            return $error;
        
        // validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $error .= "email is invalid<br />";

        include "dbconnect.php";
        $query = "SELECT * FROM friends WHERE friend_email='$email'";
        if($conn->query($query)->num_rows != 0)
            $error .= "email is already registered<br />";

        // validate profile name
        $regex = "/[a-zA-Z ]{1,30}/";
        if (!preg_match($regex, $profilename))
            $error .= "profile name may only contain letters and spaces and be a maximum of 30 characters<br />";
        
        // validate password
        $regex = "/[a-zA-Z0-9]{1,20}/";
        if (!preg_match($regex, $password))
            $error .= "password can only contain alphanumeric characters and be no more than 20 characters long<br />";
        else if ($password != $confirmpassword)
            $error .= "passwords do not match<br />";

        return $error;
    }

    function AddUser($email, $profilename, $password)
    {
        $query = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends) VALUES (";
        $query .= "'$email', '$password', '$profilename', CURRENT_DATE, 0)";
        
        include "dbconnect.php";
        $conn->query($query);
    }
?>