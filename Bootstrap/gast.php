<?php
include '..\createDatabases/dbconnect.php';
include '..\databaseArray.php';
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome - <?php echo $row ['userEmail']; ?></title>
    </head>
    <body>
        <p>Hi' <?php echo $user; ?></p>
        <br>
        <a href="logout.php?logout">&nbsp;Sign Out</a>
        <br>
    </body>
</html>