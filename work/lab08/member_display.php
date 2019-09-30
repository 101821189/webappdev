<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 8" />
    <meta name="keywords" content="web, programming" />
    <title>web app dev lab 8</title>
</head>
<body>
    <h1>members display</h1>
    <?php
        require_once("settings.php");

        // attempt to connect to the db
        $conn = new mysqli($host, $user, $pwd, $sql_db);
        if ($conn->connect_error)
        {
            die("connection failed: " . $conn->connect_error);
        }

        // query the db
        $query = "SELECT member_id, fname, lname FROM vipmembers";
        if ($result = $conn->query($query))
        {
            // display results
            echo "<table>";
            echo "    <tr>";
            echo "        <th>member id</th>";
            echo "        <th>first name</th>";
            echo "        <th>last name</th>";
            echo "    </tr>";
            while ($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "    <td>" . $row["member_id"] . "</td>";
                echo "    <td>" . $row["fname"] . "</td>";
                echo "    <td>" . $row["lname"] . "</td>";
                echo "<tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>
