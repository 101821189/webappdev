<?php
    session_start();
    $number = $_SESSION["number"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: web app dev week 9" />
    <meta name="keywords" content="web, programming" />
    <title>web app dev week 9</title>
</head>
<body>
    <h1>web app dev week 9</h1>
    <p>the number was <?php echo $number; ?></p>
    <a href="startover.php">start over</a>
</body>
</html>
