<?php
    // check if our jobs file exists
    function CheckFile()
    {
        include "filename.php";
        if (!file_exists($filename))
            return false;
        else
            return true;
    }

    // display a message when we don't find anything
    function NothingHere($message)
    {
        echo "<h1>nothing here :(</h1>";
        echo "<p>$message <a href='searchjobform.php'>go back to search form.</a></p>";
    }

    // we can safely assume that the jobs file exists here
    // will return an array of our job entries
    function ReadJobs()
    {
        include "filename.php";
        $handle = fopen($filename, "r");

        $res = explode("\n", fread($handle, filesize($filename)));
        fclose($handle);

        return $res;
    }

    // does what it says on the tin
    function GetFields($job)
    {
        return explode("\t", $job);
    }

    // check if a job matches a term
    function CheckMatch($job, $term)
    {
        $fields = GetFields($job);

        foreach ($fields as $field)
        {
            if (strpos($job, $term) !== false)
                return true;
        }

        return false;
    }

    // only used in PrintJob to display a new row
    function GetRow($title, $content)
    {
        $res = "";
        $res .= "<tr>";
        $res .= "    <td class='minorHeading'>$title</td>";
        $res .= "    <td>$content</td>";
        $res .= "</tr>";

        return $res;
    }

    // display a job and all it's fields
    function GetJobDisplay($job)
    {
        $fields = GetFields($job);
        $res = "";
        
        $res .= "<div class='jobListing'>";
        $res .= "<table class='table'>";
        $res .= GetRow("id:", $fields[0]);
        $res .= GetRow("title:", $fields[1]);
        $res .= GetRow("description:", $fields[2]);
        $res .= GetRow("closing date:", $fields[3]);
        $res .= GetRow("position:", $fields[4]);
        $res .= GetRow("contract:", $fields[5]);
        // checking if we need to display one or two methods of application
        if (sizeof($fields) == 8)
        {
            $res .= GetRow("application type:", $fields[6]);
            $res .= GetRow("location:", $fields[7]);
        }
        else
        {
            $res .= GetRow("application type:", $fields[6] . " " . $fields[7]);
            $res .= GetRow("location:", $fields[8]);
        }
        $res .= "</table>";
        $res .= "</div>";

        return $res;
    }
?>