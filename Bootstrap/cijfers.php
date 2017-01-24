<?php
session_start();
if (!isset($_GET['Studentnummer']) || empty($_GET))
{
    $portnummer = $_SESSION['user'];
} else
{
    $portnummer = $_GET['Studentnummer'];
}
require_once '..\createDatabases/dbconnect.php';
include '..\Functions\common.php';
include '..\databaseArray.php';
if (!isset($_SESSION['user']))
{
    header("Location: index.php");
    exit;
}
        $user = $_SESSION['user'];
        $query = "SELECT * FROM users WHERE studentnummer = '$user'";
        $result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $Studentnummer = $user;
            $cijfer = "cijfer";
            $query3 = "select * From $cijfer where studentnummer = $Studentnummer";
            $result3 = mysqli_query($conn, $query3);
            foreach ($result3 as $res3) {
                $studentnummer = $res3['studentnummer'];
                $Informatiemanagement = $res3['Informatiemanagement'];
                $PHP = $res3['PHP'];
                $HTMLCSS = $res3['HTML_en_CSS'];
                $Digital_Graphic_Design_1 = $res3['Digital_Graphic_Design_1'];
                $Project_Professionele_Website = $res3['Project_Professionele_Website'];
                $Mondelinge_communicatie_1 = $res3['Mondelinge_communicatie_1'];
                $Databases_1 = $res3['Databases_1'];
                $Unleash_your_Potential_in_PHP = $res3['Unleash_your_Potential_in_PHP'];
                $Studieloopbaanbegeleiding_1A = $res3['Studieloopbaanbegeleiding_1A'];
                $Project_Digitale_Portfolio = $res3['Project_Digitale_Portfolio'];
                $Schriftelijke_Communicatie = $res3['Schriftelijke_Communicatie'];
                $Java_1 = $res3['Java_1'];
                $Computernetwerken_1 = $res3['Computernetwerken_1'];
                $Inleiding_Wiskunde = $res3['Inleiding_Wiskunde'];
                $Project_Solar_Bot = $res3['Project_Solar_Bot'];
                $Studieloopbaanbegeleiding_1B = $res3['Studieloopbaanbegeleiding_1B'];
                $Csharp_1 = $res3['Csharp_1'];
                $Multimedia_Productie = $res3['Multimedia_Productie'];
                $Project_Stenden_Creative_Realization = $res3['Project_Stenden_Creative_Realization '];
                $studentnummer = $res3['studentnummer'];
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
                        <li><a href="portfolio.php"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li class="active"><a href="cijfers.php"><?php echo $lang['Cijferlijst']; ?><span class="sr-only">(current)</span></a></li>
                        <li><a href="gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['Cijferlijst']; ?></h1>
                </div>
            </div></div>  


        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">
                    <div class="bs-callout bs-callout-danger">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th><?php echo $lang['codestudie']; ?></th>
                                    <th><?php echo $lang['aantalec']; ?></th>
                                    <th><?php echo $lang['cijfer']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Informatiemanagement</td>
                                    <td>3.0</td>
                                    <td><?php echo $Informatiemanagement?></td>
                                </tr>
                                <tr>
                                    <td>Inleiding Programmeren in PHP</td>
                                    <td>3.0</td>
                                    <td><?php echo $PHP?></td>
                                </tr>
                                
                                <tr>
                                    <td>(X)HTML en CSS</td>
                                    <td>3.0</td>
                                    <td><?php echo $HTMLCSS?></td>
                                </tr>
                                <tr>
                                    <td>Digital Graphic Design 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Digital_Graphic_Design_1?></td>
                                </tr>
                                <tr>
                                    <td>Project Professionele Website</td>
                                    <td>3.0</td>
                                    <td><?php echo $Project_Professionele_Website?></td>
                                </tr>
                                <tr>
                                    <td>Mondelinge communicatie 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Mondelinge_communicatie_1?></td>
                                </tr>
                                <tr>
                                    <td>Databases 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Databases_1?></td>
                                </tr>
                                <tr>
                                    <td>Unleash your Potential in PHP</td>
                                    <td>3.0</td>
                                    <td><?php echo $Unleash_your_Potential_in_PHP?></td>
                                </tr>
                                <tr>
                                    <td>Studieloopbaanbegeleiding 1a</td>
                                    <td>3.0</td>
                                    <td><?php echo $Studieloopbaanbegeleiding_1A?></td>
                                </tr>
                                <tr>
                                    <td>Project Digitale Portfolio</td>
                                    <td>3.0</td>
                                    <td><?php echo $Project_Digitale_Portfolio?></td>
                                </tr>
                                <tr>
                                    <td>Schriftelijke Communicatie 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Schriftelijke_Communicatie?></td>
                                </tr>
                                <tr>
                                    <td>Java 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Java_1?></td>
                                </tr>
                                <tr>
                                    <td>Computernetwerken 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Computernetwerken_1?></td>
                                </tr>
                                <tr>
                                    <td>Inleiding Wiskunde</td>
                                    <td>3.0</td>
                                    <td><?php echo $Inleiding_Wiskunde?></td>
                                </tr>
                                <tr>
                                    <td>Project Solar Bot</td>
                                    <td>3.0</td>
                                    <td><?php echo $Project_Solar_Bot?></td>
                                </tr>
                                <tr>
                                    <td>Studieloopbaanbegeleiding 1b</td>
                                    <td>3.0</td>
                                    <td><?php echo $Studieloopbaanbegeleiding_1B?></td>
                                </tr>
                                <tr>
                                    <td>C# 1</td>
                                    <td>3.0</td>
                                    <td><?php echo $Csharp_1?></td>
                                </tr>
                                <tr>
                                    <td>Multimedia Productie</td>
                                    <td>3.0</td>
                                    <td><?php echo $Multimedia_Productie?></td>
                                </tr>
                                <tr>
                                    <td>Project Stenden Creative - Realization</td>
                                    <td>6.0</td>
                                    <td><?php echo $Project_Stenden_Creative_Realization?></td>
                                </tr>
                            </tbody>
                        </table>
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
