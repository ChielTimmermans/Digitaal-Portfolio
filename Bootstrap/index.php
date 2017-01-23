<?php
include'..\functions\common.php';

if (isset($_SESSION['user']))
{
    header("Location: portfolio.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Login</title>

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="ssets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dist/css/signin.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="assets/js/ie-emulation-modes-warning.js"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="jumbotron2">
                <?php
                include '..\loginsystem\index.php';
                ?>
                <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <h2 class="form-signin-heading text-muted"><?php echo $lang['login']; ?></h2>
                    <label for="inputEmail" class="sr-only"><?php echo $lang['email']; ?></label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="name" value="
                    <?php
                    if (isset($_POST['btn-login']))
                    {
                        echo $name;
                    }
                    ?>
                           "required autofocus>
                    <span><p><?php echo $emailError; ?></p></span>
                    <label for="inputPassword" class="sr-only" >Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
                    <span><p><?php echo $passError; ?></p></span>
                    <span><p><?php echo $error; ?></p></span>	


                    <br><button class='btn btn-lg btn-primary btn-block' type='submit' name="btn-login">Log in</button>

                </form>
                <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <h2 class="form-signin-heading text-muted"><?php echo $lang['gastlogin']; ?></h2>

                    <button class='btn btn-lg btn-warning btn-block' type='submit' name="guest-login"><?php echo $lang['gastlogin'] ?></button>

                </form>
                <a href = "?lang=nl">Nederlands</a>
                <a href = "?lang=en">Engels</a>
            </div></div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

