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
                        <li><a href="backend/student/home.php"><?php echo $lang['Instellingen']; ?></a></li>
                        <li><a href="contact.php"><?php echo $lang['Contact']; ?></a></li>
                        <li><a href="<?php echo $lang['TaalLink']; ?>"><?php echo $lang['Taal']; ?></a></li>
                        <li><a href="logout.php?logout"><?php echo $lang['Uitloggen']; ?></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-lg hidden-md hidden-sm">
                        <li><a href="#"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="#"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="#"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="#"><?php echo $lang['Gastenboek']; ?></a></li>
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
                        <li><a href="#"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['cijferwijzigen']; ?></h1>
                </div>
            </div></div>  



        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">

                    <div class="bs-callout bs-callout-danger">
                        <form method='post' action='#' autocomplete='off'>
                            <table class="table table-striped table-responsive ">
                                <thead>
                                    <tr>
                                        <th><?php echo $lang['codestudie']; ?></th>
                                        <th><?php echo $lang['cijfer']; ?></th>
                                        <th><?php echo $lang['wijzig']; ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            $naam = $_GET['student'];
                                            $studentnummer = substr($naam, -6);

                                            $cijferarray = array("Informatiemanagement", "PHP", "HTML_en_CSS", "Digital_Graphic_Design_1",
                                                "Project_Professionele_Website", "Mondelinge_communicatie_1", "Databases_1", "Unleash_your_Potential_in_PHP",
                                                "Studieloopbaanbegeleiding_1A", "Project_Digitale_Portfolio", "Schriftelijke_Communicatie", "Java_1", "Computernetwerken_1",
                                                "Inleiding_Wiskunde", "Project_Solar_Bot", "Studieloopbaanbegeleiding_1B", "Csharp_1", "Multimedia_Productie", "Project_Stenden_Creative_Realization");

                                            echo "<select name='Vak[]'>";
                                            foreach ($cijferarray as $res4) {
                                                echo "<option value='$res4'>$res4</option>";
                                            }
                                            echo "</select>";
                                            if (isset($_POST['submit'])) {
                                                foreach ($_POST['Vak'] as $select3) {
                                                    
                                                }
                                            }
                                            ?>

                                        </td>
                                        <td><input id="textinput" name="cijfer" type="number" step="0.1" min="0" max="10" placeholder="0-10" class="form-control input-md"></td>
                                        <td><button id="button1id" type="submit" name="submit" class="btn btn-success pull-right"><?php echo $lang['wijzig']; ?></button></td>

                                    </tr>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $vak = $select3;
                                        $cijfer = ($_POST['cijfer']);
                                        $query3 = "Update cijfer set $vak='$cijfer' where studentnummer='$studentnummer'";
                                        $res = mysqli_query($conn, $query3);
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                        <?php
                        echo"<a href='invoercijfers.php?student=" . $_GET['student'] . "'>&#8592;</a>";
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
