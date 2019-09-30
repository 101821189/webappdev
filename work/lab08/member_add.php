<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 8" />
    <meta name="keywords" content="web, programming" />
    <title>web app dev lab 8</title>
</head>
<body>
    <h1>add a member</h1>
    <?php
        require_once("settings.php");

        // attempt to connect to the db
        $conn = new mysqli($host, $user, $pwd, $sql_db);
        if ($conn->connect_error)
        {
            die("connection failed: " . $conn->connect_error);
        }

        // query the db
        $query = "SELECT * FROM vipmembers";
        if (!$conn->query($query)) // check if table exists
        {
            // table does not exist
            $query = "CREATE TABLE vipmembers (";
            $query .= "member_id INT AUTO_INCREMENT PRIMARY KEY,";
            $query .= "fname VARCHAR(40),";
            $query .= "lname VARCHAR(40),";
            $query .= "gender VARCHAR(1),";
            $query .= "email VARCHAR(40),";
            $query .= "phone VARCHAR(20))";
            $conn->query($query);
        }

        // add the entry to our db
        $query = "INSERT INTO vipmembers ";
        $query .= "(fname, lname, gender, email, phone) VALUES (";
        $query .= "'" . $_POST["fname"] . "',";
        $query .= "'" . $_POST["lname"] . "',";
        $query .= "'" . $_POST["gender"] . "',";
        $query .= "'" . $_POST["email"] . "',";
        $query .= "'" . $_POST["phone"] . "')";
        if ($conn->query($query))
        {
            echo "<p>added successfully</p>";
        }
        else
        {
            echo "<p>uh oh something went wrong: " . $conn->error . "</p>";
        }
    ?>
</body>
</html>
