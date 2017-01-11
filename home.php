<?php

session_start();
require_once 'loginsystem/dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT * FROM users WHERE user = 2";
$result = mysqli_query($conn, $query)
  or die("Error: ".mysqli_error($conn));
$row=  mysqli_fetch_array($result,MYSQLI_ASSOC);



echo $_SESSION['user'];
echo "&nbsp; &nbsp; &nbsp;";
echo $query;
echo "&nbsp; &nbsp; &nbsp;";
foreach ($row as $data){
    echo $data;
}
echo "&nbsp; &nbsp; &nbsp;";
echo $user;
if (!$result){
    echo "fout";
}
if (!$query){
    echo "foutq";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Welcome - <?php echo $result['0']; ?></title>
    </head>
    <body>
        <p>Hi' <?php echo $result['0']; ?></p>
        <a href="logout.php?logout">&nbsp;Sign Out</a>
    </body>
</html>