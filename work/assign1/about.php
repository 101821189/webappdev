<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 1" />
    <meta name="keywords" content="web, programming" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="main.css" />

    <title>assignment 1 || about</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
        <h1>about</h1>
        <ul>
            <li>currently, this server is running PHP version <?php echo phpversion(); ?></li>
            <li>for this assignment, i have completed/attempted all of the tasks</li>
            <li>for this assignment i have done the following extra tasks:
            <ul>
                <li>used bootstrap</li>
                <li>created custom styling with CSS</li>
                <li>utilised a class structure to allow for sorting by date in the search results</li>
                <li>added a checkbox to toggle sorting by dates in the search results</li>
            </ul></li>
        </ul>

        <p>i have provided the following discussion on the discussion board:</p>
        <img src="discussionboard.jpg" alt="discussion board example" />
    </main>
</body>
</html>
