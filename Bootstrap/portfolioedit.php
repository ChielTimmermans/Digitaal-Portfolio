<?php
session_start();
require_once '..\CreateDatabases/dbconnect.php';
include '..\Functions\common.php';
include '..\databaseArray.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT * FROM users WHERE Studentnummer = $user";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


$getovermij = "SELECT overmij FROM portfoliotext WHERE Studentnummer = '$user'";
$overmijresult = mysqli_query($conn, $getovermij);
$oldovermij = mysqli_fetch_array($overmijresult, MYSQLI_ASSOC);


$getdiplomas = "SELECT diplomas FROM portfoliotext WHERE Studentnummer = $user";
$diplomasresult = mysqli_query($conn, $getdiplomas);
$olddiplomas = mysqli_fetch_array($diplomasresult, MYSQLI_ASSOC);

$gethobbies = "SELECT hobbies FROM portfoliotext WHERE Studentnummer = $user";
$hobbiesresul = mysqli_query($conn, $gethobbies);
$oldhobbies = mysqli_fetch_array($hobbiesresul, MYSQLI_ASSOC);

$getwerkervaring = "SELECT werkervaring FROM portfoliotext WHERE Studentnummer = $user";
$werkervaringresult = mysqli_query($conn, $getwerkervaring);
$oldwerkervaring = mysqli_fetch_array($werkervaringresult, MYSQLI_ASSOC);

$error = false;

if (isset($_POST[submit])) {

    $overmij = trim($_POST['overmij']);
    $overmij = strip_tags($overmij);

    $hobbies = trim($_POST['hobbies']);
    $hobbies = strip_tags($hobbies);

    $diplomas = trim($_POST['diplomas']);
    $diplomas = strip_tags($diplomas);

    $werkervaring = trim($_POST['werkervaring']);
    $werkervaring = strip_tags($werkervaring);

    if (empty($overmij)) {
        $error = true;
        $overmijError = "Please enter something.";
    }
    if (empty($hobbies)) {
        $error = true;
        $hobbiesError = "Please enter something.";
    }
    if (empty($diplomas)) {
        $error = true;
        $diplomasError = "Please enter something.";
    }
    if (empty($werkervaring)) {
        $error = true;
        $werkervaringError = "Please enter something.";
    }
    if (!$error) {

        $gettext = ("SELECT overmij, diplomas, hobbies, werkervaring FROM portfoliotext WHERE Studentnummer = $user");
        $oldtext = mysqli_query($conn, $gettext);

        $updatetext = "UPDATE portfoliotext SET overmij = '$overmij', diplomas = '$diplomas', hobbies = '$hobbies', werkervaring = '$werkervaring' WHERE Studentnummer = '$user'";
        $resupdate = mysqli_query($conn, $updatetext);

        if (!empty($_POST['avatar'])) {
            $target_dir = "images/avatars/";
            $imageFileType = "." . pathinfo(basename($_FILES["avatar"]["name"]), PATHINFO_EXTENSION);
            $target_file = $target_dir . $username . $imageFileType;
            if ($imageFileType != ".jpg" && $imageFileType != ".png" && $imageFileType != ".jpeg" && $imageFileType != ".gif") {
                echo "only JPG, PNG, JPEG en GIF files.";
            } else {
                $queryInsert = "UPDATE portfoliotext SET avatar = '$target_file')";
                mysqli_query($DBConnect, $queryInsert);
                if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                    echo "There was an error uploading the file, please try again!";
                } else {
                    $_SESSION['image'] = $target_file;
                    header('Location: portfolio.php');
                }
            }
        }
    }
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
                        <li><a href="backend/student/home.php"><?php echo $lang['Instellingen']; ?></a></li>
                        <li><a href="contact.php"><?php echo $lang['Contact']; ?></a></li>
                        <li><a href="<?php echo $lang['TaalLink']; ?>"><?php echo $lang['Taal']; ?></a></li>
                        <li><a href="logout.php?logout"><?php echo $lang['Uitloggen']; ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                        <li><a href="portfolio.php"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="cijfers.php"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
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
                                        <li class="list-group-item"><?php echo $lang['naam']; ?>: <?php
                                            echo "$userNaam ";
                                            echo $userAchterNaam;
                                            ?></li>
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
                        <div class="bs-callout bs-callout-danger">
                            <h4><?php echo $lang['Overmij']; ?></h4>
                            <textarea class="overmij" name="overmij"><?php
                                foreach ($oldovermij as $arrovermij) {
                                    echo $arrovermij;
                                }
                                ?></textarea>
                        </div>
                        <div>
                        </div>
                        <div class="bs-callout bs-callout-danger">
                            <h4><?php echo $lang['Diplomas']; ?></h4>
                            <textarea class="overmij" name="diplomas"><?php
                                foreach ($olddiplomas as $arrdiplomas) {
                                    echo $arrdiplomas;
                                }
                                ?></textarea>
                        </div>
                        <div class="bs-callout bs-callout-danger">
                            <h4>Hobby's en interesses</h4>
                            <textarea class="overmij" name="hobbies"><?php
                                foreach ($oldhobbies as $arrhobbies) {
                                    echo $arrhobbies;
                                }
                                ?></textarea>
                        </div>
                        <div class="bs-callout bs-callout-danger">
                            <h4>Werk ervaring</h4>
                            <ul class="list-group">
                                <textarea class="overmij" name="werkervaring"><?php
                                    foreach ($oldwerkervaring as $arrwerkervaring) {
                                        echo $arrwerkervaring;
                                    }
                                    ?></textarea>
                            </ul>
                        </div>
                        <input type="file" name="avatar" id="avatar"><br><br>
                        <button type="submit" name="submit">Opslaan</button>
                    </form>
                </div>
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
