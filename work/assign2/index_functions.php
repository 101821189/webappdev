<?php
    Process();

    function Process()
    {
        include "dbconnect.php";

        // check if friends table exists
        $query = "SELECT * FROM friends";
        if(!$conn->query($query))
        {
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
            
            include "dummydata.php";
            for ($i = 0; $i < 10; $i++)
            {
                $name = $names[rand(0, count($names) - 1)];
                $domain = $domains[rand(0, count($domains) - 1)];
                $query = "INSERT INTO friends (friend_email, password, profile_name, date_started, num_of_friends) ";
                $query .= "VALUES ('$name@$domain.com', '$name', '$name', CURRENT_DATE, 0)";

                $conn->query($query);
            }
        }

        // check if myfriends table exists
        $query = "SELECT * FROM myfriends";
        if(!$conn->query($query))
        {
            $query = "CREATE TABLE IF NOT EXISTS myfriends ("; $query .= "friend_id1 INT NOT NULL,";
            $query .= "friend_id2 INT NOT NULL)";

            if($conn->query($query))
                echo "<p>created myfriends table successfully</p>";
            else
                echo "<p>uh oh something went wrong when creating the myfriends table</p>";

            for ($i = 0; $i < 20; $i++)
            {
                while (true)
                {
                    $id1 = rand(1, 10);
                    $id2 = $id1;
                    while ($id1 == $id2)
                        $id2 = rand(1, 10);

                    $query = "SELECT * FROM myfriends WHERE friend_id1 = $id1 AND friend_id2 = $id2";
                    if ($conn->query($query)->num_rows == 0)
                    {
                        $query = "INSERT INTO myfriends (friend_id1, friend_id2) VALUES ($id1, $id2)";
                        $conn->query($query);

                        $query = "UPDATE friends SET num_of_friends = num_of_friends + 1 WHERE friend_id = $id1";
                        $conn ->query($query);
                        break;
                    }
                }
            }
        }
    }
?>