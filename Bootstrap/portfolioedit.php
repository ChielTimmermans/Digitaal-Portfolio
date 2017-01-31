<?php
session_start();
require_once '..\CreateDatabases/dbconnect.php';
include '..\Functions\common.php';
include '..\databaseArray.php';

if (($_SESSION['Rol']) != "1") {
    header("Location: index.php");
}

$user = $_SESSION['user'];
$avaquery = "SELECT avatar FROM portfoliotext WHERE Studentnummer = '$user'";
$avaresult = mysqli_query($conn, $avaquery)
        or die("Error: " . mysqli_error($conn));
$avarow = mysqli_fetch_array($avaresult, MYSQLI_ASSOC);
$query = "SELECT * FROM users WHERE Studentnummer = $user";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


$getovermij = "SELECT overmij FROM portfoliotext WHERE Studentnummer = '$user'";
$overmijresult = mysqli_query($conn, $getovermij);
$oldovermij = mysqli_fetch_array($overmijresult, MYSQLI_ASSOC);

$gethobbies = "SELECT hobbies FROM portfoliotext WHERE Studentnummer = '$user'";
$hobbiesresult = mysqli_query($conn, $gethobbies);
$oldhobbies = mysqli_fetch_array($hobbiesresult, MYSQLI_ASSOC);

$getstudie = "SELECT studie FROM portfoliotext WHERE Studentnummer = $user";
$studieresul = mysqli_query($conn, $getstudie);
$oldstudie = mysqli_fetch_array($studieresul, MYSQLI_ASSOC);

$getschool = "SELECT school FROM portfoliotext WHERE Studentnummer = $user";
$schoolresul = mysqli_query($conn, $getschool);
$oldschool = mysqli_fetch_array($schoolresul, MYSQLI_ASSOC);

$getAfstudeerjaar = "SELECT Afstudeerjaar FROM portfoliotext WHERE Studentnummer = $user";
$Afstudeerjaarresul = mysqli_query($conn, $getAfstudeerjaar);
$oldAfstudeerjaar = mysqli_fetch_array($Afstudeerjaarresul, MYSQLI_ASSOC);

$getwerkervaring = "SELECT werkervaring FROM portfoliotext WHERE Studentnummer = $user";
$werkervaringresult = mysqli_query($conn, $getwerkervaring);
$oldwerkervaring = mysqli_fetch_array($werkervaringresult, MYSQLI_ASSOC);

$error = false;

if (isset($_POST[submit])) {

    $overmij = trim($_POST['overmij']);
    $overmij = strip_tags($overmij);

    $hobbies = trim($_POST['hobbies']);
    $hobbies = strip_tags($hobbies);

    $studie = trim($_POST['studie']);
    $studie = strip_tags($studie);

    $school = trim($_POST['school']);
    $school = strip_tags($school);

    $Afstudeerjaar = trim($_POST['Afstudeerjaar']);
    $Afstudeerjaar = strip_tags($Afstudeerjaar);

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
    if (empty($studie)) {
        $error = true;
        $diplomasError = "Please enter something.";
    }
    if (empty($school)) {
        $error = true;
        $diplomasError = "Please enter something.";
    }
    if (empty($Afstudeerjaar)) {
        $error = true;
        $diplomasError = "Please enter something.";
    }
    if (empty($werkervaring)) {
        $error = true;
        $werkervaringError = "Please enter something.";
    }
    if (!$error) {

        $gettext = ("SELECT overmij, studie, school, Afstudeerjaar, hobbies, werkervaring FROM portfoliotext WHERE Studentnummer = $user");
        $oldtext = mysqli_query($conn, $gettext);

        $updatetext = "UPDATE portfoliotext SET overmij = '$overmij', studie = '$studie',school='$school',Afstudeerjaar='$Afstudeerjaar', hobbies = '$hobbies', werkervaring = '$werkervaring' WHERE Studentnummer = '$user'";
        echo $updatetext;
        $resupdate = mysqli_query($conn, $updatetext);

        if (!empty($_FILES['avatar'])) {
            $filename = stripslashes($_FILES['avatar']['name']);
            echo $filename;
            $expl = explode('.', $filename);
            $file_basename = $user; // give new name
            $file_ext = $expl[1]; // get file extention
            $filesize = stripslashes($_FILES['avatar']['size']);
            $allowed_file_types = array('gif', 'jpg', 'pjpg', 'png');
            $target_dir = "images/avatars/";
            $newfilename = $file_basename . '.' . $file_ext;
            $target_file = $target_dir . $newfilename;

            if (in_array($file_ext, $allowed_file_types) && ($filesize < 2000000000)) {
                if (file_exists($target_file)) {
                    foreach ($avarow as $path) {
                        unlink('images/avatars/'
                                . $path
                        );
                    }
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_dir);
                    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                        echo "There was an error uploading the file, please try again!";
                        echo $target_file;
                    } else {
                        $avaq = "UPDATE portfoliotext SET avatar = '$newfilename'";
                        $resava = mysqli_query($conn, $avaq);
                        echo "File uploaded successfully.";
                    }

                    if (!unlink($target_file)) {
                        echo 'bestand vervangen niet gelukt';
                    }
                } else {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_dir);
                    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                        echo "There was an error uploading the file, please try again!";
                        echo $target_file;
                    } else {
                        $avaq = "UPDATE portfoliotext SET avatar = '$newfilename'";
                        $resava = mysqli_query($conn, $avaq);
                        echo "File uploaded successfully.";
                    }
                }
            } elseif ($filesize > 2000000000) {
                echo "The file you are trying to upload is too large.";
            } else {
                echo "Only these file typs are allowed for upload: " . implode(', ', $allowed_file_types);
            }
        }
    }

    header("Location: portfolio.php");
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
            </div>
        </div>  


        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="<?php
                                        foreach ($avarow as $path) {
                                            echo 'images/avatars/'
                                            . $path;
                                        }
                                        ?>">
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

                    <form method="post" action="portfolioedit.php" enctype="multipart/form-data">
                        <div class="bs-callout bs-callout-danger">
                            <h4><?php echo $lang['Overmij']; ?></h4>
                            <textarea class="overmij" name="overmij"><?php
                                foreach ($oldovermij as $arrovermij) {
                                    echo $arrovermij;
                                }
                                ?></textarea>
                        </div>
                        <div>
                            <?php
                            echo $target_file;
                            if (!empty($_FILES['avatar'])) {
                                echo 'fileupload is niet leeg';
                            }
                            ?> 
                        </div>
                        <div class="bs-callout bs-callout-danger">
                            <h4><?php echo $lang['Diplomas']; ?></h4>
                            <table class="table table-striped table-responsive ">
                                <tr>
                                    <th><?php echo $lang['Studie']; ?></th>
                                    <th><?php echo $lang['School']; ?></th>
                                    <th><?php echo $lang['Afstudeerjaar']; ?></th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="studie" value="<?php
                                        foreach ($oldstudie as $arrstudie) {
                                            echo $arrstudie;
                                        }
                                        ?>"></td>
                                    <td><input type="text" name="school" value="<?php
                                        foreach ($oldschool as $arrschool) {
                                            echo $arrschool;
                                        }
                                        ?>"></td>
                                    <td><input type="text" name="Afstudeerjaar" value="<?php
                                               foreach ($oldAfstudeerjaar as $arrAfstudeerjaar) {
                                                   echo $arrAfstudeerjaar;
                                               }
                                        ?>"></td>
                                </tr>    
                            </table>
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
                            <textarea class="overmij" name="werkervaring"><?php
                                foreach ($oldwerkervaring as $arrwerkervaring) {
                                    echo $arrwerkervaring;
                                }
                                        ?></textarea>
                        </div>
                        Avatar:
                        <input type="file" name="avatar"><br><br>
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
