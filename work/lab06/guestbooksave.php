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
        if (isset($_POST["name"]) && isset($_POST["email"]))
        {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $filename = "../../data/lab06/guestbook.txt";

            if (!file_exists("../../data/lab06"))
                mkdir("../../data/lab06", 0777, true);

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
                        $namedata[] = $data[0];
                        $emaildata[] = $data[1];
                    }
                }

                fclose($handle);
                $newdata = (!in_array($name, $namedata) && !in_array($email, $emaildata));
            }
            else
            {
                $newdata = true;
            }

            if ($newdata)
            {
                $handle = fopen($filename, "a");
                $data = "$name,$email\n";

                fputs($handle, $data);
                fclose($handle);

                $alldata[] = array($name, $email);

                echo "<p>guest added</p>";
            }
            else
            {
                echo "<p>guest already booked in</p>";
            }
        }
        else
        {
            echo "<p>please enter guest name and email in the input form</p>";
        }
    ?>
</body>
</html>
