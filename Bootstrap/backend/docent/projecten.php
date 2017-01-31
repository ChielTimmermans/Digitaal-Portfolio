<?php
session_start();
if (!isset($_GET['Studentnummer']) || empty($_GET)) {
    $portnummer = $_SESSION['user'];
} else {
    $portnummer = $_GET['Studentnummer'];
}
require_once '..\..\..\createDatabases\dbconnect.php';
include '..\functions\common.php';
include '..\..\..\databaseArray.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
$user = $_SESSION['user'];
$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$leerling = $_GET['student'];
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
                        <li><a href="../../logout.php?logout"><?php echo $lang['Uitloggen']; ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                        <li><a href="#"><?php echo $lang['nbeschikbaar']; ?></a></li>
                        <li><a href="#"><?php echo $lang['nbeschikbaar']; ?></a></li>
                        <li><a href="#"><?php echo $lang['nbeschikbaar']; ?></a></li>
                        <li><a href="../../gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="#"><?php echo $lang['nbeschikbaar']; ?></a></li>
                        <li><a href="#"><?php echo $lang['nbeschikbaar']; ?></a></li>
                        <li><a href="#"><?php echo $lang['nbeschikbaar']; ?></a></li>
                        <li><a href="../../gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['projectenvan'];
echo "<br> $leerling";
?> </h1>
                </div>
            </div></div>
        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">
                    <div class="bs-callout bs-callout-danger">

<?php
$leerling2 = substr($leerling, -6);
$query2 = "SELECT * FROM projecten WHERE studentnummer = '$leerling2'";
$result2 = mysqli_query($conn, $query2);
$row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);

$item = 1;
$project = 4;
for ($item = 1; $item <= $project; $item++) {
    if (!empty($row2['Projecttitel' . $item . ''])) {
        echo'  <a class="list-group-item inactive-link" href="#">
                                               <h4 class="list-group-item-heading">' .
        $row2['Projecttitel' . $item . '']
        . '</h4>
                                               <p class="list-group-item-text">' .
        $row2['Projecttitel' . $item . '']
        . '</p>
                                           </a>';
        echo "<p><a href='bijlage.php?student=$leerling$item'><button id='button1id' name='bijlagen' class='btn btn-info'>";
        echo $lang['bekijkbijlagen'];
        echo "</button></a></p>
                                            <p><a href='beoordeel.php?student=$leerling'><button id='button1id' name='beoordeel' class='btn btn-success'>";
        echo $lang['beoordeelproject'];
        echo "</button></a></p>";
    } elseif ($item === 1) {
        echo '  <div class="list-group-item inactive-link">
                                            <p class="list-group-item-text">' .
        "Er zijn geen projecten."
        . '</p>
                                        </div>';
    }
}
echo "<a href='overzichtprojecten.php?student=$leerling'>&#8592;</a>";
?>  
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
