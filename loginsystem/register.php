<?php
ob_start();
session_start();
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
}
include_once 'dbconnect.php';

$error = false;

if (isset($_POST['btn-signup'])) {

    // clean user inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // basic name validation
    if (empty($name)) {
        $error = true;
        $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
        $error = true;
        $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $nameError = "Name must contain alphabets and space.";
    }  else {
        // check name exist or not
        $query = "SELECT userName FROM users WHERE userName='$name'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count != 0) {
            $error = true;
            $nameError = "Provided Name is already in use.";
        }
    }

    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // check email exist or not
        $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
        $result = mysql_query($query);
        $count = mysql_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }
    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    }

    // password encrypt using SHA256();
    $password = hash('sha256', $pass);

    // if there's no error, continue to signup
    if (!$error) {

        $query = "INSERT INTO users(userName,userPass,userEmail) VALUES('$name','$password','$email')";
        $res = mysql_query($query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <p>Sign Up.</p>
            <hr />
            <input type="text" name="name" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
            <span><?php echo $nameError; ?></span>
            <br><br>
            <input type="email" name="email" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
            <span><?php echo $emailError; ?></span>
            <br><br>
            <input type="password" name="pass" placeholder="Enter Password" maxlength="15" />   
            <span><?php echo $passError; ?></span>
            <br><br>
            <input type="text" name="userImagePath" placeholder="Enter your avatar here" />
            <hr />        
            <button type="submit" name="btn-signup">Sign Up</button>
            <span><?php echo $errMSG; ?></span>
            <hr />
            <a href="index.php">Sign in Here...</a>
        </form>
    </body>
</html>
<?php ob_end_flush(); ?>