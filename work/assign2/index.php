<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 2" />
    <meta name="keywords" content="web, programming" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="main.css" />

    <title>assignment 2 || index</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
    <h1>my friends system</h1>
        <table class="table" style="width:50%;margin:auto;">
            <tr>
                <td class="minorHeading">Name:</td>
                <td>Daniel Coady</td>
            </tr>
            <tr>
                <td class="minorHeading">Student ID:</td>
                <td>102084174</td>
            </tr>
            <tr>
                <td class="minorHeading">Email:</td>
                <td>102084174@student.swin.edu.au</td>
            </tr>
        </table>
        <br />

        <p>
            i declare that this assignment is my individual work. I have not worked collaboratively nor
            have i copied from any other student's work or from any other source.
        </p>
        <p>
            as well as my own work, i have utilised the following resources:
        </p>
        <ul>
            <li>bootstrap</li>
        </ul>

        <?php
            include "index_functions.php"
        ?>
    </main>
</body>
</html>
