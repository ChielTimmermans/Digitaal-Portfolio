<?php
session_start();
require_once '..\CreateDatabases/dbconnect.php';
include '..\functions\common.php';
include '..\databaseArray.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


$getovermij = "SELECT overmij FROM portfoliotext WHERE userID = '$user'";
$oldovermij = mysqli_query($conn, $getovermij);

$getdiplomas = "SELECT diplomas FROM portfoliotext WHERE userID = '$user'";
$olddiplomas = mysqli_query($conn, $getdiplomas);

$getwerkervaring = "SELECT werkervaring FROM portfoliotext WHERE userID = '$user'";
$oldwerkervaring = mysqli_query($conn, $getwerkervaring);

if (isset($_POST['submit'])) {
    $gettext = ("SELECT overmij, diplomas, hobbies, werkervaring FROM portfoliotext WHERE userID ='$user' ");
    $oldtext = mysqli_query($conn, $gettext);
    
    $overmij = $_POST['overmij'];
    $diplomas = $_POST['diplomas'];
    $hobbies = $_POST['hobbies'];
    $werkervaring = $_POST['werkervaring'];

        $updatedata = "UPDATE portfoliotext SET (overmij, diplomas, hobbies, werkervaring) = ('$overmij', '$diplomas', '$hobbies', '$werkervaring'";
        $updateinto = mysqli_query($conn, $updatedata);

    
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
        <link rel="icon" href="dist/css/images/favicon.ico">

        <title>Portfolio | Stenden Hogeschool</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dist/css/dashboard.css" rel="stylesheet">

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


        <nav class="navbar navbar-inverse navbar-fixed-top header-bg">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://stenden.com">
                        <img src="images/stenden_logo1.png" alt="Stenden Logo">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="backend/student/home.html"><?php echo $lang['Instellingen']; ?></a></li>
                        <li><a href="contact.php"><?php echo $lang['Contact']; ?></a></li>
                        <li><a href = "<?php echo $lang['TaalLink']; ?>"><?php echo $lang['Taal']; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="portfolio.php"><?php echo $lang['Portfolio']; ?><span class="sr-only">(current)</span></a></li>
                        <li><a href="projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="cijfers.php"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['Portfolio']; ?></h1>
                </div>
            </div></div>  


        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="dist/css/images/profileblank.png">
                                    </figure>
                                    <div class="row">
                                        <div class="col-xs-12 social-btns">



                                            <div class="col-xs-3 col-md-1 col-lg-1 social-btn-holder">
                                                <a href="#" class="btn btn-social btn-block btn-linkedin">
                                                    <i class="fa fa-linkedin"></i> </a>
                                            </div>


                                        </div>


                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"><?php echo $lang['naam']; ?>: <?php echo "$userNaam ";
                                        echo $userAchterNaam; ?></li>
                                        <li class="list-group-item"><?php echo $lang['Studie/Functie']; ?>: Student informatica</li>
                                        <li class="list-group-item"><?php echo $lang['School/bedrijf']; ?>: Stenden Hogeschool </li>
                                        <li class="list-group-item"><?php echo $lang['Woonplaats']; ?>: <?php echo $userWoonplaats; ?> </li>
                                        <li class="list-group-item"><i class="fa fa-phone"></i><?php echo $lang['Nummer']; ?>: <?php echo "0$userMobielNummer"; ?></li>
                                        <li class="list-group-item"><i class="fa fa-envelope"></i><?php echo $lang['Studie']; ?>: <?php echo $userEmail; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="portfolioedit.php">
                        <div class="bs-callout <?php include 'stijl2.php'; ?>">
                            <h4><?php echo $lang['Overmij']; ?></h4>
                            <textarea class="overmij" name="overmij" value="<?php $oldovermij ?>"></textarea>
                        </div>
                        <div class="bs-callout <?php include 'stijl2.php'; ?>">
                            <h4><?php echo $lang['Diplomas']; ?></h4>
                            <textarea class="diplomas" name="diplomas" value="<?php $olddiplomas ?>"></textarea>
                        </div>
                        <div class="bs-callout <?php include 'stijl2.php'; ?>">
                            <h4>Hobby's en interesses</h4>
                            <textarea class="hobbies" name="hobbies" value="<?php $oldhobbies ?>"></textarea>
                        </div>
                        <div class="bs-callout <?php include 'stijl2.php'; ?>">
                            <h4>Werk ervaring</h4>
                            <textarea class="" name="werkervaring" value="<?php $oldwerkervaring ?>"></textarea>
                        </div>
                    <button type="submit" name="submit">Opslaan</button>
                    </form>
                </div>
            </div>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
