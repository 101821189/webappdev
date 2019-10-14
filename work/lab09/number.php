<?php
    session_start();
    if (!isset($_SESSION["number"]))
        $_SESSION["number"] = 0;
    $num = $_SESSION["number"];
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
    <?php
        echo "<p>the number is $num</p>";
    ?>
    <a href="numberup.php">up</a>
    <a href="numberdown.php">down</a>
    <a href="numberreset.php">reset</a>
</body>
</html>
