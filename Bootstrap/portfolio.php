<?php
session_start();
$portnummer = $_GET['Studentnummer'];
require_once '..\createDatabases/dbconnect.php';
include '..\Functions\common.php';
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
                        <li><a href="contact.html"><?php echo $lang['Contact']; ?></a></li>
                        <li><a href="<?php echo $lang['TaalLink']; ?>"><?php echo $lang['Taal']; ?></a></li>
						<li><a href="logout.php"><?php echo $lang['Uitloggen']; ?></a></li>
                    </ul>
        </div>
      </div>
    </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="portfolio.html"><?php echo $lang['Mijnportfolio']; ?><span class="sr-only">(current)</span></a></li>
                        <li><a href="projecten.html"><?php echo $lang['MijnProjecten']; ?></a></li>
						<li><a href="cijfers.html"><?php echo $lang['MijnCijferlijst']; ?></a></li>
                        <li><a href="gastenboek.html"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['Mijnportfolio']; ?></h1>
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
                                        <li class="list-group-item"><?php echo $lang['naam']; ?>: <?php echo "$userNaam "; echo $userAchterNaam;?></li>
                                        <li class="list-group-item"><?php echo $lang['Studie/Functie']; ?></li>
                                        <li class="list-group-item"><?php echo $lang['School/bedrijf']; ?></li>
										<li class="list-group-item"><?php echo $lang['Woonplaats']; ?>: <?php echo $userWoonplaats;?></li>
                                        <li class="list-group-item"><i class="fa fa-phone"></i><?php echo $lang['Nummer']; ?>: <?php echo "0$userMobielNummer" ;?></li>
                                        <li class="list-group-item"><i class="fa fa-envelope"></i><?php echo $lang['Studie']; ?>: <?php echo $userEmail ;?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					

                    <div class="bs-callout bs-callout-danger">
                        <h4><?php echo $lang['Overmij']; ?></h4>
                        <p>
                            Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                            te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                        </p>
                        <p>
                            Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis. 
                            Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                        </p>
                    </div>
										                    <div class="bs-callout bs-callout-danger">
                        <h4><?php echo $lang['Diplomas']; ?></h4>
                        <table class="table table-striped table-responsive ">
                            <thead>
                                <tr>
                                    <th><?php echo $lang['Studie']; ?></th>
                                    <th><?php echo $lang['School']; ?></th>
                                    <th><?php echo $lang['Afstudeerjaar']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Netwerkbeheer N4</td>
                                    <td>Drenthe College</td>
                                    <td> 2016 </td>
                                </tr>
                                <tr>
                                    <td>Medewerker beheer-ICT</td>
                                    <td>Drenthe College</td>
                                    <td> 2014 </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Hobby's en interesses</h4>
                        <p>
                            Software Engineering, Machine Learning, Image Processing,
                            Computer Vision, Artificial Neural Networks, Data Science,
                            Evolutionary Algorithms.
                        </p>
                    </div>
                    <div class="bs-callout bs-callout-danger">
                        <h4>Werk ervaring</h4>
                        <ul class="list-group">
                            <a class="list-group-item inactive-link" href="#">
                                <h4 class="list-group-item-heading">
                                    Medewerker servicedesk
                                </h4>
                                <p class="list-group-item-text">
                                    Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                                    te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                </p>
                            </a>
                            <a class="list-group-item inactive-link" href="#">
                                <h4 class="list-group-item-heading">Medewerker verkoopklaar</h4>
                                <p class="list-group-item-text">
                                    Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                                    Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                                    nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                </p>
                                <ul>
                                    <li>
                                        Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                                        Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                                        nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                    </li>
                                    <li>
                                        Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. 
                                        Quis verear mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, 
                                        nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                                    </li>
                                </ul>
                                <p></p>
                            </a>
                        </ul>
                    </div>
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
