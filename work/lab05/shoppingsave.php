<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 5" />
    <meta name="keywords" content="web, programming" />
    <title>shopping save</title>
</head>
<body>
    <h1>web app dev - lab 5</h1>
    <?php
        if (isset($_POST["item"]) && isset($_POST["qty"]))
        {
            $item = $_POST["item"];
            $qty = $_POST["qty"];
            $filename = "../../data/shop.txt";

            $handle = fopen($filename, "a"); // open file in append mode
            $data = "$item, $qty\n";
            fwrite($handle, $data);
            fclose($handle);

            echo "<p>shopping list</p>";

            $handle = fopen($filename, "r");
            while (!feof($handle))
            {
                $data = fgets($handle);
                echo "<p>$data</p>";
            }
            fclose($handle);
        }
        else
        {
            echo "<p>please enter information into the form</p>";
        }
    ?>
</body>
</html>
