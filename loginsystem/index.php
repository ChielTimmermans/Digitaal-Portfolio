<?php
ob_start();

require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if (isset($_SESSION['user']) != "") {
    header("Location: home.php");
    exit;
}

$error = false;

if (isset($_POST['btn-login'])) {

    // prevent sql injections/ clear user invalid inputs
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs

    if (empty($name)) {
        $error = true;
        $emailError = "Please enter your email address.";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

        $password = hash('sha256', $pass); // password hashing using SHA256

        $res = mysql_query("SELECT userId, userName, userPass FROM users WHERE userName='$name'");
        $row = mysql_fetch_array($res);
        $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

        if ($count == 1 && $row['userPass'] == $password) {
            $_SESSION['user'] = $row['userId'];
            header("Location: home.php");
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
            echo $errMSG;
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta Charset="utf-8" />
        <title>Inloggen Stenden Twitter</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <p>Sign In.<p>
            <hr />
            <input type="text" name="name" class="form-control" placeholder="Your Name" value="<?php echo $email; ?>" maxlength="40" />
            <p><?php echo $emailError; ?></p>
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
            <p><?php echo $passError; ?></p>
            <hr />
            <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            <hr />

        </form>
    </body>
</html>
<?php ob_end_flush(); ?>