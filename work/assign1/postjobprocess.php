<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 1" />
    <meta name="keywords" content="web, programming" />
    <style>
        .minorHeading {
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.css" />

    <title>assignment 1 || post job process</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
        <?php
            include "postjobfunctions.php";

            // validate inputs
            if (ValidateInputs())
            {
                if (WriteData())
                {
                    echo "<h1>success!</h1>";
                    echo "<p>congratulations, your job has been posted!</p>";
                }
                else
                {
                    echo "<h1>huh... that shouldn't happen</h1>";
                    echo "<p>something went wrong with your application. maybe " .
                    "<a href='postjobform.php'>go back</a> and try again?</p>";
                }
            }

        ?>
    </main>
</body>
</html>
