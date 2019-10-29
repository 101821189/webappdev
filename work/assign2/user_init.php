<?php
    // some stuff to init the current user
    include "dbconnect.php";

    $email = $_SESSION["email"];
    $query = "SELECT * FROM friends WHERE friend_email = '$email'";
    $result = $conn->query($query)->fetch_assoc();
    $user = new User($result["friend_id"]);
?>