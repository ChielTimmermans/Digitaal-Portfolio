<?php
ob_start();
session_start();
//if (isset($_SESSION['user']) != "") {
//    header("Location: ..\home.php");
//}
include_once '..\createdatabases/dbconnect.php';

$error = false;

if (isset($_POST['btn-signup']))
{

    $studentnummer = trim($_POST['studentnummer']);
    $studentnummer = strip_tags($studentnummer);
    $studentnummer = htmlspecialchars($studentnummer);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass2 = trim($_POST['pass2']);
    $pass2 = strip_tags($pass2);
    $pass2 = htmlspecialchars($pass2);

    //basic email validation
        
        $query = "SELECT studentnummer FROM users WHERE studentnummer='$studentnummer'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0)
        {
            $error = true;
            $nummerError = "Provided studentnummer is already in use.";
        }elseif (strlen($studentnummer) < 6 ){
            $error = true;
            $nummerError = "Provided studentnummer is to short";
        }elseif (strlen($studentnummer) > 6 ){
            $error = true;
            $nummerError = "provided studentnumber is to long";
        }elseif ($studentnummer < 0){
            $error = true;
            $nummerError = "provided Studentnumber is negative";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error = true;
            $emailError = "Please enter valid email address.";
        } else
        {
            // check email exist or not
            $query = "SELECT userEmail FROM users WHERE userEmail='$email '";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if ($count != 0)
            {
                $error = true;
                $emailError = "Provided Email is already in use.";
            }
        }
        // password validation
        if (empty($pass))
        {
            $error = true;
            $passError = "Please enter password.";
        } else if (strlen($pass) < 6)
        {
            $error = true;
            $passError = "Password must have atleast 6 characters.";
        }        if ($pass !== $pass2){
            $error = true;
            $passError2 = "password do not match.";
        }

        // password encrypt using SHA256();
        $password = hash('sha256', $pass  );


        // if there's no error, continue to signup
        if (!$error)
        {

            $query = "INSERT INTO users(Studentnummer, userEmail,userPass) VALUES('$studentnummer','$email','$password')";
            $res = mysqli_query($conn, $query);

            if ($res)
            {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                unset($name);
                unset($email);
                unset($pass);
            } else
            {
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
                <p>user registeren</p>
                <hr />
                <input type="number" name="studentnummer" placeholder="Enter your studentnumber" maxlength="8" value="<?php echo $studentnummer ?>"/>
                <span><?php echo $nummerError?></span>
                <br><br>
                <input type="email" name="email" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span><?php echo $emailError; ?></span>
                <br><br>
                <input type="password" name="pass" placeholder="Enter Password" maxlength="15" />   
                <span><?php echo $passError, $passError2; ?></span>
                <br><br>
                <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" />   
                
                <br><br>
                <button type="submit" name="btn-signup">Sign Up</button>
                <span><?php echo $errMSG; ?></span>

                <hr />

            </form>
        </body>
    </html>
    <?php ob_end_flush(); ?>