<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 8" />
    <meta name="keywords" content="web, programming" />
    <title>web app dev lab 8</title>
</head>
<body>
    <h1>web programming lab 8</h1>
    <?php
        require_once("settings.php");

        // attempt to connect to the db
        $conn = new mysqli($host, $user, $pwd, $sql_db);
        if ($conn->connect_error)
        {
            die("connection failed: " . $conn->connect_error);
        }

        // query the db
        $query = "SELECT car_id, make, model, price FROM newcars";
        if ($result = $conn->query($query))
        {
            // display results
            echo "<table>";
            echo "    <tr>";
            echo "        <th>car id</th>";
            echo "        <th>make</th>";
            echo "        <th>model</th>";
            echo "        <th>price</th>";
            echo "    </tr>";
            while ($row = $result->fetch_assoc())
            {
                echo "<tr>";
                echo "    <td>" . $row["car_id"] . "</td>";
                echo "    <td>" . $row["make"] . "</td>";
                echo "    <td>" . $row["model"] . "</td>";
                echo "    <td>" . $row["price"] . "</td>";
                echo "<tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>
