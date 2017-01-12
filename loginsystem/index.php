<?php
//if(isset($_SESSION['user']) != ""){
session_start();
//}
//if (isset($_SESSION['user']) != "") {
//    header("Location: home.php");
//    exit;
//}

require_once 'dbconnect.php';

$error = false;
if (isset($_POST['guest-login']))
{

    $_SESSION['user'] = "guest";
    echo $_SESSION['user'];
    echo "gelukt";
    header("Location: ..\gast.php");
}

if (isset($_POST['btn-login']))
{
    // prevent sql injections/ clear user invalid inputs
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // prevent sql injections / $gast user invalid inputs

    if (empty($name))
    {
        $error = true;
        $emailError = "Please enter your email address.";
    }

    if (empty($pass))
    {
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error)
    {

        $password = hash('sha256', $pass); // password hashing using SHA256

        $res = mysqli_query($conn, "SELECT Studentnummer, userEmail, userPass FROM users WHERE userEmail='$name'");
        $row = mysqli_fetch_array($res);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

        if ($count == 1 && $row['userPass'] == $password)
        {
            $_SESSION['user'] = $row['Studentnummer'];
            echo "gelukt";
            header("Location: home.php");
        } else
        {
            $errMSG = "Incorrect Credentials, Try again...";
            echo $errMSG;
        }
    }
}
?>