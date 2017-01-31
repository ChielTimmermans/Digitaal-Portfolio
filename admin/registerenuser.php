<?php
ob_start();
session_start();
session_start();
if (($_SESSION['Rol']) != "4"){
    header("Location: ..\index.php");
}

include_once '..\createdatabases/dbconnect.php';

$error = false;

if (isset($_POST['btn-signup'])) {

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
    if ($count != 0) {
        $error = true;
        $nummerError = "Provided studentnummer is already in use.";
    } elseif (strlen($studentnummer) < 6) {
        $error = true;
        $nummerError = "Provided studentnummer is to short";
    } elseif (strlen($studentnummer) > 6) {
        $error = true;
        $nummerError = "provided studentnumber is to long";
    } elseif ($studentnummer < 0) {
        $error = true;
        $nummerError = "provided Studentnumber is negative";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // check email exist or not
        $query = "SELECT userEmail FROM users WHERE userEmail='$email '";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
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
    } if ($pass !== $pass2) {
        $error = true;
        $passError2 = "password do not match.";
    }

    // password encrypt using SHA256();
    $password = hash('sha256', $pass);


    // if there's no error, continue to signup
    if (!$error) {

        $query = "INSERT INTO users(Studentnummer, userEmail,userPass) VALUES('$studentnummer','$email','$password')";
        $res = mysqli_query($conn, $query);

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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../Bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../Bootstrap/assets/js/ie-emulation-modes-warning.js"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" class="form-horizontal">
            <fieldset>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="studentnummer">Studentnummer</label>  
                    <div class="col-md-4">
                        <input id="studentnummer" class="form-control input-md" type="number" name="studentnummer" placeholder="Studentnumber" value="<?php echo $studentnummer; ?>" required="">
                        <span><?php echo $nummerError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>  
                    <div class="col-md-4">
                        <input type="email" name="email" maxlength="50" placeholder="Email address" value="<?php echo $email; ?>" class="form-control input-md" required="">
                        <span><?php echo $emailError; ?></span><br><br>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="wachtwoord">Wachtwoord</label>
                    <div class="col-md-4">
                        <input type="password" name="pass" placeholder="Enter Password" maxlength="15" class="form-control input-md" required="">
                        <span><?php echo $passError, $passError2; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="wachtwoord2">Herhaal wachtwoord</label>
                    <div class="col-md-4">
                        <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" class="form-control input-md" required="">
                        <br><br>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="signup"></label>
                    <div class="col-md-4">
                        <button type="submit" id="signup" name="btn-signup" class="btn btn-success">Registreer/Register</button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="signup"></label>
                    <div class="col-md-4">
                        <a href="adminkeuze.php" class="btn btn-success">Terug naar het keuze menu</a>
                    </div>
                </div>
                <span><?php echo $errMSG; ?></span>
            </fieldset>
        </form>
    </body>
</html>
<?php ob_end_flush(); ?>