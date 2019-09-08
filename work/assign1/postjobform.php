<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="web programming :: assignment 1" />
    <meta name="keywords" content="web, programming" />

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="forms.css" />
    <link rel="stylesheet" href="main.css" />

    <title>assignment 1 || post a job</title>
</head>
<body>
    <?php include "header.php"; ?>

    <main class="container lead">
        <h1>post a job</h1>
        <form action="postjobprocess.php" method="post">
            <fieldset>
                <legend>enter job details below</legend>
                <table>
                    <tr>
                        <td><label for="positionid">position id:</label></td>
                        <td><input type="text" name="positionid" id="positionid" placeholder="eg. P00001" /></td>
                    </tr>
                    <tr>
                        <td><label for="title">title:</label></td>
                        <td><input type="text" name="title" id="title" placeholder="eg. full stack web dev" /></td>
                    </tr>
                    <tr>
                        <td><label for="description">description:</label></td>
                        <td><textarea rows="4" cols="25" name="description" id="description"></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="closingdate">closing date:</label></td>
                        <td><input type="date" name="closingdate" id="closingdate"/></td>
                    </tr>
                    <tr>
                        <td><label>position:</label></td>
                        <td>
                            <input type="radio" name="position" id="positionfulltime" value="full time" /><label for="positionfulltime">full time</label>
                            <input type="radio" name="position" id="positionparttime" value="part time" /><label for="positionparttime">part time</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label>contract:</label></td>
                        <td>
                            <input type="radio" name="contract" id="contractongoing" value="ongoing" /><label for="contractongoing">ongoing</label>
                            <input type="radio" name="contract" id="contractfixedterm" value="fixed term" /><label for="contractfixedterm">fixed term</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label>application by:</label></td>
                        <td>
                            <input type="checkbox" name="applicationtype1" id="applicationtype1" value="post" /><label for="applicationtype1">post</label>
                            <input type="checkbox" name="applicationtype2" id="applicationtype2" value="mail" /><label for="applicationtype2">mail</label>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="location">location:</label></td>
                        <td>
                            <select name="location" id="location">
                                <option selected>---</option>
                                <option>ACT</option>
                                <option>NSW</option>
                                <option>NT</option>
                                <option>QLD</option>
                                <option>SA</option>
                                <option>TAS</option>
                                <option>VIC</option>
                                <option>WA</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="reset" value="reset" class="formButtons btn btn-secondary" />
                <input type="submit" value="submit" class="formButtons btn btn-primary" />
            </fieldset>
        </form>

        <p class="goHome"><a href="index.php">return to the home page</a></p>
    </main>
</body>
</html>
