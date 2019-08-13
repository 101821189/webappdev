<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 2" />
    <meta name="keywords" content="web, programming" />
    <title>is even</title>
</head>
<body>
    <?php
        $num = "eeeeeeeeeeeeeeeeeee";
        $output = "the variable $num ";

        if (is_numeric($num))
        {
            $num = round($num);
            if ($num % 2 == 0)
            {
                $output .= "contains an even number";
            }
            else
            {
                $output .= "contains an odd number";
            }
        }
        else
        {
            $output .= "does not contain a number";
        }

        echo "<p>$output</p>";
    ?>
</body>
</html>
