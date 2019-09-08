<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 1" />
    <meta name="keywords" content="web, programming" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="main.css" />

    <title>assignment 1 || search job process</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
        <?php
            include "searchjobfunctions.php";
            include "genericfunctions.php";
            include "entry.php";

            if (!isset($_GET["searchterm"]) || $_GET["searchterm"] == "")
            {
                ErrorMessage(
                    "looks like you didn't search for anything.",
                    "searchjobform.php"
                );
            }
            else
            {
                // check if the jobs file even exists
                if (!CheckFile())
                {
                    NothingHere("looks like we don't have any jobs available.");
                }
                else
                {
                    $term = $_GET["searchterm"];
                    $filter = $_GET["filter"];
                    $jobs = ReadJobs();

                    if ($filter == "filter by...") // default search
                    {
                        $result = RegularSearch($jobs, $term);
                    }
                    else // not so default search
                    {
                        $result = NotSoRegularSearch($jobs, $term, $filter);
                    }


                    if ($result[0] == "")
                        NothingHere("none of our jobs matched your criteria.");
                    else
                    {
                        if (isset($_GET["sortbydate"]))
                        {
                            SortByDate($result[1], $jobs);
                        }
                        else
                        {
                            echo "<h1>here's some jobs that matched what you're looking for</h1>";
                            echo "<h2>optionally, you could <a href='searchjobform.php'>search again</a></h2>";
                            echo $result[0];
                        }
                    }
                }
            }
        ?>
    </main>
</body>
</html>
