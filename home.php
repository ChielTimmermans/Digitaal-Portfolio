<?php

session_start();
require_once 'loginsystem/dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}


$res = "SELECT * FROM `users` WHERE userEmail = ".$_SESSION['user'];
$result = mysqli_query($conn, $res);
$userrow=  mysqli_fetch_array($result, MYSQLI_BOTH);

echo $_SESSION['user'];
echo $res;
echo $result;
if (!$result){
    echo "fout";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome - <?php echo $userRow['user']; ?></title>
    </head>
    <body>
        <p>Hi' <?php echo $userRow['userEmail']; ?></p>
        <a href="logout.php?logout">&nbsp;Sign Out</a>
    </body>
</html>