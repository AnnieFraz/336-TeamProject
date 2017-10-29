<?php session_start();

?>
<!DOCTYPE html>
<html>
        <head>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        </head>
<body>
    <?php
    $_SESSION["song_title"] = "id";
    print($_SESSION);
    ?>
</body>
</html>
    