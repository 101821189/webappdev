<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 5" />
    <meta name="keywords" content="web, programming" />
    <title>guestbook show</title>
</head>
<body>
    <h1>web app dev - lab 5</h1>
    <?php
        $filename = "../../data/guestbook.txt";

        echo "<p>guest list</p>";
        $handle = fopen($filename, "r");

        if ($handle === false)
        {
            echo "<p>no guests signed in</p>";
            echo "<p><a href=\"guestbookform.php\">go back to form</a></p>";
        }
        else
        {
            $guests = explode("\n", fread($handle, filesize($filename)));

            foreach ($guests as $guest)
                echo "<p>$guest</p>";

            fclose($handle);
        }
    ?>
</body>
</html>
