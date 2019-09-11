<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 1" />
    <meta name="keywords" content="web, programming" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="main.css" />

    <title>assignment 1 || index</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
        <h1>you found the super secret delete page : o</h1>
        <h2>if there's no errors below then the delete was successful</h2>
        <?php
            include "filename.php";
            unlink($filename);
            rmdir($dir);
        ?>
    </main>
</body>
</html>
