<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: prime number" />
    <meta name="keywords" content="web, programming" />
    <title>prime number</title>
</head>
<body>
    <h1>web app dev - lab 3</h1>
    <?php
        function is_prime($num)
        {
            if ($num > 1)
            {
                for ($i = 2; $i < $num; $i++)
                {
                    if ($num % $i == 0)
                        return false;
                }

                return true;
            }
            else
            {
                return true;
            }
        }

        if (isset($_GET["num"]))
        {
            $num = $_GET["num"];
            if (is_numeric($num))
            {
                if ($num >= 1)
                {
                    if ($num == round($num)) // num is an int
                    {
                        if ($num > 999)
                        {
                            echo "<p>please enter a number less than 999</p>";
                        }
                        else
                        {
                            (is_prime($num))
                                ? $result = "prime"
                                : $result = "not prime";

                            echo "<p>$num is $result</p>";
                        }
                    }
                    else // num is not an int
                    {
                        echo "<p>please enter an integer</p>";
                    }
                }
                else
                {
                    echo "<p>please enter a number greater than 0</p>";
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
    <p><a href="primenumberform.php">go back</a></p>
</body>
</html>
