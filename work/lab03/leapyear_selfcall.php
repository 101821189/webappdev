<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: leap year" />
    <meta name="keywords" content="web, programming" />
    <title>leap year</title>
</head>
<body>
    <h1>web app dev - lab 3</h1>
    <form action="leapyear_selfcall.php" method="GET">
        <label for="year">year: </label>
        <input type="text" name="year" />
        <input type="submit" value="submit" />
    </form>
    <?php
        function is_leapyear($year)
        {
            $result = "standard";

            if ($year % 4 == 0)
                if ($year % 100 != 0)
                    $result = "leap";
                elseif ($year % 400 == 0)
                    $result = "leap";
            else
                $result = "standard";

            return $result;
        }

        if (isset($_GET["year"]))
        {
            $year = $_GET["year"];
            if (is_numeric($year))
            {
                if ($year >= 0)
                {
                    if ($year == round($year)) // num is an int
                    {
                        $result = is_leapyear($year);
                        echo "<p>$year is a $result year</p>";
                    }
                    else // num is not an int
                    {
                        echo "<p>please enter an integer</p>";
                    }
                }
                else
                {
                    echo "<p>please enter a positive number</p>";
                }
            }
            else
            {
                echo "<p>please enter a number</p>";
            }
        }
    ?>
</body>
</html>
