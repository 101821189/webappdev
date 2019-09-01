<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 5" />
    <meta name="keywords" content="web, programming" />
    <title>shopping form</title>
</head>
<body>
    <h1>web app dev - lab 5</h1>
    <form action="shoppingsave.php" method="POST">
        <label for="item">item: </label>
        <input type="text" name="item" /><br />
        <label for="qty">quantity: </label>
        <input type="text" name="qty" /><br />
        <input type="submit" value="submit" />
    </form>
</body>
</html>
