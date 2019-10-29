<?php
    include "user_class.php";
    include "user_class_functions.php";

    if (isset($_GET["id"]))
        AddFriend();
    else
        Process();

    function Process()
    {
        include "user_init.php";

        echo "<h1>$user->username's friend add page</h1>";
        ShowTable($user);
    }

    function ShowTable($user)
    {
        $users = GetAllUsers();
        echo "<table class='table' style='width: 50%; text-align: center; margin: auto'>";
        echo "    <tbody class='table-striped'>";
        foreach ($users as $u)
        {
            // check that we should show this user
            if ($u->id != $user->id && !IsFriends($user, $u))
                ShowRow($u);
        }
        echo "    </tbody>";
        echo "</table>";
    }

    function ShowRow($user)
    {
        echo "<tr>";
            echo "<td>$user->username</td>";
            echo "<td><a href='friendadd.php?id=$user->id' class='btn btn-success'>add friend</a></td>";
        echo "</tr>";
    }

    function AddFriend()
    {
        include "user_init.php";
        include "dbconnect.php";

        $otherid = $_GET["id"];

        // insert entry to myfriends table
        $query = "INSERT INTO myfriends (friend_id1, friend_id2) ";
        $query .= "VALUES ($user->id, $otherid)";
        $conn->query($query);
        
        // increment current friend count
        $user->numfriends += 1;
        $user->Commit();

        // now continue on as normal
        Process();
    }
?>