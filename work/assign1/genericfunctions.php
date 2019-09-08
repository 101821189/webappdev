<?php
    function ErrorMessage($message, $prevpage)
    {
        echo "<h1>uh oh</h1>";
        echo "<p class='message'>$message<a href='$prevpage'> go back</a> and try again</p>";
    }
?>