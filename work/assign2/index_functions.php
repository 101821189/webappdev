<?php
    Process();

    function Process()
    {
        include "dbconnect.php";

        // create the tables if they do not exist yet
        $query = "CREATE TABLE IF NOT EXISTS friends (";
        $query .= "friend_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
        $query .= "friend_email VARCHAR(50) NOT NULL,";
        $query .= "password VARCHAR(20) NOT NULL,";
        $query .= "profile_name VARCHAR(30) NOT NULL,";
        $query .= "date_started DATE NOT NULL,";
        $query .= "num_of_friends INT UNSIGNED)";

        if($conn->query($query))
            echo "<p>created friends table successfully</p>";
        else
            echo "<p>uh oh something went wrong when creating the friends table</p>";

        $query = "CREATE TABLE IF NOT EXISTS myfriends (";
        $query .= "friend_id1 INT NOT NULL,";
        $query .= "friend_id2 INT NOT NULL)";

        if($conn->query($query))
            echo "<p>created myfriends table successfully</p>";
        else
            echo "<p>uh oh something went wrong when creating the myfriends table</p>";
    }
?>