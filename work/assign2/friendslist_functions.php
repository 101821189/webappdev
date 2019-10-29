<?php
    include "user_class.php";
    include "user_class_functions.php";

    if (isset($_GET["id"]))
        RemoveFriend();
    else
        Process();

    function Process()
    {
        include "user_init.php"; // this file will init $user for us
        echo "<h1>$user->username's friends</h1>";
        if ($user->numfriends == 0)
            echo "<h2>looks like you have no friends :(</h2>";
        else
            echo "<h2>you have $user->numfriends friends</h2>";
        
        ShowFriendsList($user);
    }

    function ShowFriendsList($user)
    {
        include "dbconnect.php";
        
        $query = "SELECT * FROM myfriends WHERE friend_id1 = $user->id";
        $result = $conn->query($query);
        
        ShowTable($result);
    }

    function ShowTable($result)
    {
        echo "<table class='table' style='width: 50%; text-align: center; margin: auto'>";
        echo "    <tbody class='table-striped'>";
        while ($row = $result->fetch_assoc())
            ShowRow($row);
        echo "    </tbody>";
        echo "</table>";
    }

    function ShowRow($row)
    {
        // find the user's name
        include "dbconnect.php";
        $query = "SELECT * FROM friends WHERE friend_id = " . $row["friend_id2"];
        $result = $conn->query($query)->fetch_assoc();

        echo "<tr>";
            echo "<td>" . $result["profile_name"] . "</td>";
            echo "<td><a href='friendslist.php?id=" . $result["friend_id"] . "' class='btn btn-danger'>unfriend</a></td>";
        echo "</tr>";
    }

    function RemoveFriend()
    {
        include "user_init.php";
        include "dbconnect.php";

        $otherid = $_GET["id"];

        // remove entry from myfriends table
        $query = "DELETE FROM myfriends WHERE ";
        $query .= "friend_id1 = $user->id AND ";
        $query .= "friend_id2 = $otherid";
        $conn->query($query);
        
        // decrement current friend count
        $user->numfriends -= 1;
        $user->Commit();

        // now continue on as normal
        Process();
    }
?>