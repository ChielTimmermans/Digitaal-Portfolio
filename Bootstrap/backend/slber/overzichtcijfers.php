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
if (($_SESSION['Rol']) != "3") {
    header("Location: ..\..\index.php");
}
$user = $_SESSION['user'];
$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
                        <li><a href="backend/slber/home.php"><?php echo $lang['Instellingen']; ?></a></li>
                        <li><a href="contact.php"><?php echo $lang['Contact']; ?></a></li>
                        <li><a href="<?php echo $lang['TaalLink']; ?>"><?php echo $lang['Taal']; ?></a></li>
                        <li><a href="logout.php?logout"><?php echo $lang['Uitloggen']; ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                        <li><a href="#"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="#"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="#"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="#"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="#"><?php echo $lang['Projecten']; ?></a></li>
                        <li class="active"><a href="#"><?php echo $lang['Cijferlijst']; ?> <span class="sr-only">(current)</span></a></li>
                        <li><a href="gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['leerlingen']; ?></h1>
                </div>
            </div></div>  



        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">

                    <div class="bs-callout bs-callout-danger">
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo $lang['jaar1']; ?></div>
                            <div class="panel-body">
                                <ul class="treeview">

                                    <li><a href="#"><?php echo $lang['klas']; ?></a>
                                        <ul>
                                            <li>
<?php
echo "  <form method='post' action='#' autocomplete='off'>
                                            <select name='klas[]'>";
$query = "SELECT Klas FROM klas";
$result = mysqli_query($conn, $query);

$column = array();
while ($row = mysqli_fetch_array($result)) {
    $column[] = $row[Klas];
}
foreach ($column as $res) {
    echo "<option value='$res'>$res</option>";
}
if (isset($_POST['submit'])) {
    // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
    foreach ($_POST['klas'] as $select) {
        echo "You have selected :" . $select; // Displaying Selected Value
    }
}
echo "  </select>
                                            <button type='submit' name='submit'>get students</button>";
echo "</form>";
?>
                                                <ul>
                                                <?php
                                                $query2 = "SELECT Voornaam, Achternaam, Studentnummer From gegevens where klas ='$select'";

                                                $result2 = mysqli_query($conn, $query2);
                                                $column2 = array();
                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                    $Voornaam = $row2[Voornaam];
                                                    $Achternaam = $row2[Achternaam];
                                                    $studentnummer = $row2[Studentnummer];
                                                    $column2[] = "$Voornaam $Achternaam $studentnummer";
                                                }
                                                if (isset($_POST['submit']) or isset($_POST['submit2'])) {
                                                    foreach ($column2 as $res2) {
                                                        echo "<li><a href='invoercijfers.php?student=$res2' >$res2</a></li>";
                                                    }
                                                }
                                                ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <a href="home.php">&#8592;</a>
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
