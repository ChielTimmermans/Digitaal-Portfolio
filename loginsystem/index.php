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
<!--<!DOCTYPE html>
<html>
    <head>
        <meta Charset="utf-8" />
        <title>Inloggen Stenden Twitter</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <p>Sign In.<p>
            <hr />
            <input type="text" name="name" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
            <p><?php echo $emailError; ?></p>
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
            <p><?php echo $passError; ?></p>
            <p><?php echo $error; ?></p>
            <hr />
            <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            <hr />
        </form>
    </body>
</html>-->