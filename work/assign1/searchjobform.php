<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 1" />
    <meta name="keywords" content="web, programming" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="forms.css" />
    <link rel="stylesheet" href="main.css" />

    <title>assignment 1 || find a job</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
        <h1>find a job</h1>
        <form action="searchjobprocess.php" method="get">
            <fieldset>
                <legend>enter your search term below</legend>

                <table style="margin:auto">
                    <tr>
                        <td><input type="text" name="searchterm" /></td>
                        <td>
                            <select name="filter" style="margin:0.5em">
                                <option selected>filter by...</option>
                                <option>position</option>
                                <option>contract</option>
                                <option>application type</option>
                                <option>location</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="sortbydate" id="sortbydate" value="sort">
                            <label for="sortbydate">sort by date</label>
                        </td>
                        <td><input type="submit" value="submit" class="formButtons btn btn-primary" /></td>
                    </tr>
                </table>
            </fieldset>
        </form>

        <p class="goHome"><a href="index.php">return to the home page</a></p>
    </main>
</body>
</html>
