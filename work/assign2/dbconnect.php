<?php
    include "settings.php";
    $conn = new mysqli($host, $user, $pwd, $sql_db);

    if ($conn->connect_error)
        die("connection failed: " . $conn->connect_error);
?>