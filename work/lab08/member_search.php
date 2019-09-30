<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 8" />
    <meta name="keywords" content="web, programming" />
    <title>web app dev lab 8</title>
</head>
<body>
    <h1>member search</h1>
    <form action="member_search.php" method="post">
        <label for="lname">last name: </label>
        <input type="text" name="lname" /><br />

        <input type="submit" value="submit" />
    </form>
    <?php
        // check if the user has actually searched for anything
        if (isset($_POST["lname"]))
        {
            require_once("settings.php");

            // attempt to connect to the db
            $conn = new mysqli($host, $user, $pwd, $sql_db);
            if ($conn->connect_error)
            {
                die("connection failed: " . $conn->connect_error);
            }

            $lname = $_POST["lname"];
            $query = "SELECT member_id, fname, lname, email FROM vipmembers WHERE lname = '$lname'";
            if ($result = $conn->query($query))
            {
                // display results
                echo "<table>";
                echo "    <tr>";
                echo "        <th>member id</th>";
                echo "        <th>first name</th>";
                echo "        <th>last name</th>";
                echo "        <th>email</th>";
                echo "    </tr>";
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    echo "    <td>" . $row["member_id"] . "</td>";
                    echo "    <td>" . $row["fname"] . "</td>";
                    echo "    <td>" . $row["lname"] . "</td>";
                    echo "    <td>" . $row["email"] . "</td>";
                    echo "<tr>";
                }
                echo "</table>";
            }
        }
    ?>
</body>
</html>
