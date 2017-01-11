<?php

session_start();
require_once 'loginsystem/dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
  or die("Error: ".mysqli_error($conn));
$row=  mysqli_fetch_array($result,MYSQLI_ASSOC);

$query_2 = "select * From gegevens WHERE studentnummer = '$user'"


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome - <?php echo $row['0']; ?></title>
    </head>
    <body>
        <p>Hi' <?php echo $row['studentnummer']; ?></p>
        <a href="logout.php?logout">&nbsp;Sign Out</a>
    </body>
</html>