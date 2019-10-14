<?php
    session_start();
    if (!isset($_SESSION["guesses"]))
    {
        $_SESSION["guesses"] = 0;
        $_SESSION["number"] = rand(1, 100);
    }

    $guesses = $_SESSION["guesses"];
    $number = $_SESSION["number"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: web app dev week 9" />
    <meta name="keywords" content="web, programming" />
    <title>web app dev week 9</title>
</head>
<body>
    <h1>web app dev week 9</h1>
    <p>enter a number between 1 and 100 and click guess.</p>
    <form action="guessinggame.php" method="post">
        <input type="text" name="guess" />
        <input type="submit" value="guess" />
    </form>
    <?php
        if (isset($_POST["guess"]))
        {
            $guess = $_POST["guess"];
            if (!is_numeric($guess))
            {
                echo "<p>please enter a number</p>";
            }
            else if ($guess < 1 || $guess > 100)
            {
                echo "<p>please enter a number in the range of 1-100</p>";
            }
            else
            {
                $guesses++;
                if ($guess != $number)
                    if ($guess > $number)
                        echo "<p>number is lower</p>";
                    else
                        echo "<p>number is higher</p>";
                else
                    echo "<p>correct number</p>";
                echo "<p>you have made $guesses guesses</p>";
            }

            $_SESSION["guesses"] = $guesses;
        }
    ?>
    <a href="giveup.php">give up</a>
    <a href="startover.php">start over</a>
</body>
</html>
