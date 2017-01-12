<?php

session_start();
require_once '..\createDatabases/dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
  or die("Error: ".mysqli_error($conn));
$row =  mysqli_fetch_array($result,MYSQLI_ASSOC);




?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome - <?php echo $row ['userEmail']; ?></title>
    </head>
    <body>
        <p>Hi' <?php echo $row ['userEmail']; ?></p>
        <a href="..\displayUploads.php">upload bestanden</a>
        <br>
        <a href="logout.php?logout">&nbsp;Sign Out</a>
        <br>
    </body>
</html>