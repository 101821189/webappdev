<?php
    // used to automatically handle creating the directory if it doesn't exist
    function CheckDirectory()
    {
        include "filename.php";
        if (!file_exists($dir))
            mkdir($dir, 0777, true);
    }

    // validate any inputs from the user form
    function ValidateInputs()
    {
        include "filename.php";
        include "genericfunctions.php";

        // just so we know that the directory at least exists before we do stuff
        CheckDirectory();

        if (
            isset($_POST["positionid"]) &&
            isset($_POST["title"]) &&
            isset($_POST["description"]) &&
            isset($_POST["closingdate"]) &&
            isset($_POST["position"]) &&
            isset($_POST["contract"]) &&
            (isset($_POST["applicationtype1"]) || isset($_POST["applicationtype2"]) ) &&
            isset($_POST["location"]) &&
            $_POST["location"] != "---"
        )
        {
            // check if the id is the correct format
            if (!preg_match("/^P[0-9]{5}$/", $_POST["positionid"]))
            {
                ErrorMessage(
                    "make sure that the id is in the format \"Pxxxxx\" where x is a number.",
                    "postjobform.php"
                );

                return false;
            }

            // check if the id is a duplicate
            $handle = fopen($filename, "r");
            if ($handle === false)
                return true;

            $entries = explode("\n", fread($handle, filesize($filename)));

            foreach ($entries as $entry)
            {
                if (explode("\t", $entry)[0] == $_POST["positionid"])
                {
                    fclose($handle);
                    ErrorMessage(
                        "ensure that you aren't entering a duplicate id.", 
                        "postjobform.php"
                    );
                    
                    return false;
                }
            }
            fclose($handle);

            return true;
        }
        else
        {
            ErrorMessage(
                "looks like you're missing some stuff.",
                "postjobform.php"
            );

            return false;
        }
    }

    // write the job information to our jobs file
    function WriteData()
    {
        include "filename.php";
        $handle = fopen($filename, "a");
        if ($handle === false)
            return false;

        // prepare data for writing
        $id = $_POST["positionid"];
        $title = $_POST["title"];
        $desc = $_POST["description"];
        
        $date = $_POST["closingdate"];
        $datetemp = explode("-", $date);
        $date = $datetemp[2] . "/" . $datetemp[1] . "/" . $datetemp[0];

        $position = $_POST["position"];
        $contract = $_POST["contract"];

        if (isset($_POST["applicationtype1"]))
            $applicationtype = $_POST["applicationtype1"];
        if (isset($_POST["applicationtype2"]) && !isset($applicationtype))
            $applicationtype = $_POST["applicationtype2"];
        else if (isset($_POST["applicationtype2"]))
            $applicationtype .= "\t" . $_POST["applicationtype2"];

        $location = $_POST["location"];

        $data = "$id\t$title\t$desc\t$date\t$position\t$contract\t$applicationtype\t$location\n";

        // and now we write
        $result = fwrite($handle, $data);
        fclose($handle);
        return $result;
    }
?>