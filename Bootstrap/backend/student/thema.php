<?php
session_start();

if (!isset($_GET['Studentnummer']) || empty($_GET))
{
    $portnummer = $_SESSION['user'];
} else
{
    $portnummer = $_GET['Studentnummer'];
}
require_once '..\..\..\createDatabases\dbconnect.php';
include '..\functions\common.php';
include '..\..\..\databaseArray.php';
if (!isset($_SESSION['user']))
{
    header("Location: ..\..\index.php");
    exit;
}
$user = $_SESSION['user'];
$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

if (isset($_POST['update'])) {

    $nieuwstijl1 = ($_POST['header']);
    $huisstijl1 = ($_POST['header']);
    $nieuwstijl2 = ($_POST['accenten']);
    $huisstijl2 = ($_POST['accenten']);
    $nieuwstijl3 = ($_POST['menulinks']);
    $huisstijl3 = ($_POST['menulinks']);
    
    $query = "UPDATE gegevens SET Stijl1 = $nieuwstijl1 , Stijl2 = $nieuwstijl2 , Stijl3 = $nieuwstijl3 WHERE studentnummer = '$portnummer'";
    $ress = mysqli_query($conn, $query);
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
        <link rel="icon" href="../../dist/css/images/favicon.ico">

        <title>Portfolio | Stenden Hogeschool</title>

        <!-- Bootstrap core CSS -->
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../../dist/css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

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
                        <img src="../../dist/css/images/stenden_logo1.png" alt="Stenden Logo">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="home.php"><?php echo $lang['Instellingen']; ?></a></li>
                        <li><a href="../../contact.php"><?php echo $lang['Contact']; ?></a></li>
                        <li><a href="<?php echo $lang['TaalLink']; ?>"><?php echo $lang['Taal']; ?></a></li>
                        <li><a href="../..logout.php?logout"><?php echo $lang['Uitloggen']; ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                        <li><a href="../../portfolio.php"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="../../cijfers.php"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="../../gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="../../portfolio.php"><?php echo $lang['Portfolio']; ?><span class="sr-only">(current)</span></a></li>
                        <li><a href="projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="../../cijfers.php"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="../../gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Thema aanpassen</h1>
                </div>
            </div></div>  


        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">
                    <form method="post" action="thema.php" enctype="multipart/form-data">
                        <div class="bs-callout bs-callout-danger">
                                 <div class="thema">
                                    <p>Header:</p>
                                        <input type="radio" name="header" value="1" <?php if($huisstijl1 == 1){echo "checked";}?>/> <?php echo $lang['db']; ?><br>
                                        <input type="radio" name="header" value="2" <?php if($huisstijl1 == 2){echo "checked";}?>/> <?php echo $lang['or']; ?><br>
                                        <input type="radio" name="header" value="3" <?php if($huisstijl1 == 3){echo "checked";}?>/> <?php echo $lang['ro']; ?><br>
                                        <input type="radio" name="header" value="4" <?php if($huisstijl1 == 4){echo "checked";}?>/> <?php echo $lang['ge']; ?><br>
                                        <input type="radio" name="header" value="5" <?php if($huisstijl1 == 5){echo "checked";}?>/> <?php echo $lang['gr']; ?><br>
                                        <input type="radio" name="header" value="6" <?php if($huisstijl1 == 6){echo "checked";}?>/> <?php echo $lang['lb']; ?><br>
                                </div>
                        </div>
                        <div class="bs-callout bs-callout-danger">
                                 <div class="thema">
                                    <p>Accenten portfolio:</p>
                                        <input type="radio" name="accenten" value="1" <?php if($huisstijl2 == 1){echo "checked";}?>/> <?php echo $lang['db']; ?><br>
                                        <input type="radio" name="accenten" value="2" <?php if($huisstijl2 == 2){echo "checked";}?>/> <?php echo $lang['or']; ?><br>
                                        <input type="radio" name="accenten" value="3" <?php if($huisstijl2 == 3){echo "checked";}?>/> <?php echo $lang['ro']; ?><br>
                                        <input type="radio" name="accenten" value="4" <?php if($huisstijl2 == 4){echo "checked";}?>/> <?php echo $lang['ge']; ?><br>
                                        <input type="radio" name="accenten" value="5" <?php if($huisstijl2 == 5){echo "checked";}?>/> <?php echo $lang['gr']; ?><br>
                                        <input type="radio" name="accenten" value="6" <?php if($huisstijl2 == 6){echo "checked";}?>/> <?php echo $lang['lb']; ?><br>
                                </div>
                        </div>
                        <div class="bs-callout bs-callout-danger">
                                 <div class="thema">
                                    <p>Menu links:</p>
                                        <input type="radio" name="menulinks" value="1" <?php if($huisstijl3 == 1){echo "checked";}?>/> <?php echo $lang['db']; ?><br>
                                        <input type="radio" name="menulinks" value="2" <?php if($huisstijl3 == 2){echo "checked";}?>/> <?php echo $lang['or']; ?><br>
                                        <input type="radio" name="menulinks" value="3" <?php if($huisstijl3 == 3){echo "checked";}?>/> <?php echo $lang['ro']; ?><br>
                                        <input type="radio" name="menulinks" value="4" <?php if($huisstijl3 == 4){echo "checked";}?>/> <?php echo $lang['ge']; ?><br>
                                        <input type="radio" name="menulinks" value="5" <?php if($huisstijl3 == 5){echo "checked";}?>/> <?php echo $lang['gr']; ?><br>
                                        <input type="radio" name="menulinks" value="6" <?php if($huisstijl3 == 6){echo "checked";}?>/> <?php echo $lang['lb']; ?><br>
                                 </div><br>
                        <input type="submit" name="update"/><br>
                            <a href="home.php">&#8592;</a>
                        </div>
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
