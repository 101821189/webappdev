<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 5" />
    <meta name="keywords" content="web, programming" />
    <title>guestbook save</title>
</head>
<body>
    <h1>web app dev - lab 5</h1>
    <?php
        if (isset($_POST["fname"]) && isset($_POST["lname"]))
        {
            if ($_POST["fname"] == "" || $_POST["lname"] == "")
            {
                echo "<p>please ensure to enter both your first and last name</p>";
                echo "<p><a href=\"guestbookform.php\">go back</a></p>";
            }
            else
            {
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];
                $filename = "../../data/guestbook.txt";

                $handle = fopen($filename, "a"); // open file in append mode
                $data = "$fname $lname\n";
                if (fwrite($handle, $data))
                {
                    echo "<p>thank you for signing the guest book</p>";
                    echo "<p><a href=\"guestbookform.php\">go back</a></p>";
                }
                else
                {
                    echo "<p>there was an error signing your name to the guest book</p>";
                    echo "<p><a href=\"guestbookform.php\">go back</a></p>";
                }
                fclose($handle);
            }
        }
        else
        {
            echo "<p>please ensure to enter both your first and last name</p>";
            echo "<p><a href=\"guestbookform.php\">go back</a></p>";
        }

        echo "<p><a href=\"guestbookshow.php\">view guest book</a></p>";
    ?>
</body>
</html>
