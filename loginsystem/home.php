<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
// select loggedin users detail
$res = mysql_query("SELECT * FROM users WHERE userId=" . $_SESSION['user']);
$userRow = mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome - <?php echo $userRow['userEmail']; ?></title>
    </head>
    <body>
        <p>Hi' <?php echo $userRow['userEmail']; ?></p>
        <a href="logout.php?logout">&nbsp;Sign Out</a>
    </body>
</html>
<?php ob_end_flush(); ?>