<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: template" />
    <meta name="keywords" content="web, programming" />
    <title>lab 6</title>
</head>
<body>
    <h1>web programming - lab 6</h1>
    <?php
        if (isset($_POST["item"]) && isset($_POST["qty"]))
        {
            $item = $_POST["item"];
            $qty = $_POST["qty"];
            $filename = "../../data/shop.txt";

            $alldata = array();
            if (file_exists($filename))
            {
                $itemdata = array();
                $handle = fopen($filename, "r");

                while (!feof($handle))
                {
                    $onedata = fgets($handle);
                    if ($onedata != "")
                    {
                        $data = explode(",", $onedata);
                        $alldata[] = $data;
                        $itemdata[] = $data[0];
                    }
                }

                fclose($handle);
                $newdata = !in_array($item, $itemdata);
            }
            else
            {
                $newdata = true;
            }

            if ($newdata)
            {
                $handle = fopen($filename, "a");
                $data = "$item,$qty\n";

                fputs($handle, $data);
                fclose($handle);

                $alldata[] = array($item, $qty);

                echo "<p>shopping item added</p>";
            }
            else
            {
                echo "<p>shopping item already exists</p>";
            }

            sort($alldata);

            echo "<p>shopping list</p>";
            foreach ($alldata as $data)
            {
                echo "<p>" . $data[0] ." -- " . $data[1] . "</p>";
            }
        }
        else
        {
            echo "<p>please enter item and quantity in the input form</p>";
        }
    ?>
</body>
</html>
