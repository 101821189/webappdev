<?php
    function GetAllUsers()
    {
        include "dbconnect.php";

        $query = "SELECT * FROM friends";
        $result = $conn->query($query);
        $users = array();

        while ($row = $result->fetch_assoc())
        {
            array_push($users, new User($row["friend_id"]));
        }

        return $users;
    }

    function IsFriends($user1, $user2)
    {
        include "dbconnect.php";

        $query = "SELECT * FROM myfriends WHERE friend_id1 = $user1->id AND friend_id2 = $user2->id";
        $result = $conn->query($query)->num_rows;

        if ($result == 0)
            return false;
        else
            return true;
    }
?>