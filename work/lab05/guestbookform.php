<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 5" />
    <meta name="keywords" content="web, programming" />
    <link rel="stylesheet" href="guestbook.css" />
    <title>guestbook form</title>
</head>
<body>
    <div id="guestform">
        <h1>web app dev - lab 5</h1>
        <hr />
        <form action="guestbooksave.php" method="POST">
            <fieldset>
                <legend>enter your details to sign our guest book</legend>
                <label for="fname">first name: </label>
                <input type="text" name="fname" /><br />
                <label for="lname">last name: </label>
                <input type="text" name="lname" /><br />
                <input type="submit" value="submit" />
            </fieldset>
        </form>
        <p><a href="guestbookshow.php">view guest book</a></p>
    </div>
</body>
</html>
