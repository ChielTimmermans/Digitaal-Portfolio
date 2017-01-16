<?php
//if(isset($_SESSION['user']) != ""){
//session_start();
//}
if (isset($_SESSION['user']) === "0") {
    header("Location: admin.php");
    exit;
}
elseif (isset($_SESSION['user'])=== "1"){
    header("Location: leraar.php");
}
elseif (isset($_SESSION['user'])=== "2"){
    header("Location: leerling.php");
}
elseif (isset($_SESSION['user'])=== "3"){
    unset($_SESSION['user']);
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set


$error = false;


if (isset($_POST['btn-login']))
{

    // prevent sql injections/ clear user invalid inputs
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs

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
            header("Location: portfolio.php");
        } else
        {
            $errMSG = "Incorrect Credentials, Try again...";
            echo $errMSG;
        }
    }
}

if (isset($_POST['guest-login']))
{
    $_SESSION['user'] = "3";
    echo "gelukt";
    header("Location: gast.php");
}
?>
