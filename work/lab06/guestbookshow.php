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
        $filename = "../../data/lab06/guestbook.txt";

        $alldata = array();
        if (file_exists($filename))
        {
            $namedata = array();
            $emaildata = array();
            $handle = fopen($filename, "r");

            while (!feof($handle))
            {
                $onedata = fgets($handle);
                if ($onedata != "")
                {
                    $data = explode(",", $onedata);
                    $alldata[] = $data;
                }
            }

            sort($alldata);

            echo "<p>guest list</p>";
            foreach ($alldata as $data)
            {
                echo "<p>" . $data[0] ." -- " . $data[1] . "</p>";
            }

            fclose($handle);
        }
        else
        {
            echo "<p>no guests booked in</p>";
        }
    ?>
</body>
</html>
