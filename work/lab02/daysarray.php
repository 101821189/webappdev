<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 2" />
    <meta name="keywords" content="web, programming" />
    <title>days of the week</title>
</head>
<body>
    <?php
        $days = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
        echo "<p>the days of the week in english are:</p>";
        $output = "";
        foreach ($days as $day)
        {
            $output .= $day . ", ";
        }
        echo $output;

        $days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
        echo "<p>the days of the week in french are:</p>";
        $output = "";
        foreach ($days as $day)
        {
            $output .= $day . ", ";
        }
        echo $output;
    ?>
</body>
</html>
