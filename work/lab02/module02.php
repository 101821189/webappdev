<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: lab 2" />
    <meta name="keywords" content="web, programming" />
    <title>using variables, arrays and operators</title>
</head>
<body>
    <h1>web programming - lab 2</h1>
    <?php
        $marks = [85, 85, 95];
        $marks[1] = 90;
        $ave = array_sum($marks) / count($marks);
        ($ave >= 50)
            ? $status = "PASSED"
            : $status = "FAILED";
    
        echo "<p>the average score is $ave. you $status.</p>"
    ?>
</body>
</html>
