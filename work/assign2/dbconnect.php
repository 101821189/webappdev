<?php
    include "settings.php";
    $conn = new mysqli($host, $username, $pwd, $sql_db);

    if ($conn->connect_error)
        die("connection failed: " . $conn->connect_error);
?>