<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: factorial" />
    <meta name="keywords" content="web, programming" />
    <title>factorial</title>
</head>
<body>
    <?php
        include("mathfunctions.php");
    ?>
    <h1>web app dev - lab 3</h1>
    <?php
        if (isset($_GET["num"]))
        {
            $num = $_GET["num"];
            if (is_numeric($num))
            {
                if ($num >= 0)
                {
                    if ($num == round($num)) // num is an int
                    {
                        echo "<p>$num! is ", factorial($num), "</p>";
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
        else
        {
            echo "<p>please make an input</p>";
        }
    ?>
    <p><a href="factorialform.php">go back</a></p>
</body>
</html>
