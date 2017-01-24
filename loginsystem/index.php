<?php
//if(isset($_SESSION['user']) != ""){
//session_start();
//}

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
        $query = "SELECT Studentnummer, userEmail, userPass FROM users WHERE userEmail='$name'";
        $query2 = "SELECT Rol FROM gegevens WHERE Email='$name'";
        $res = mysqli_query($conn, $query);
        $res2 = mysqli_query($conn, $query2);
        $row = mysqli_fetch_array($res);
        $row2 = mysqli_fetch_array($res2);
        $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
        if ($count == 1 && $row['userPass'] == $password)
        {
            $_SESSION['user'] = $row['Studentnummer'];
            $_SESSION['Rol']=$row2['Rol'];
            header("Location: redirected.php");
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
