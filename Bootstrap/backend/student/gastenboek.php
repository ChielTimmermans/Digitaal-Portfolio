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
    header("Location: ..\..\index.php");
    exit;
}
$user = $_SESSION['user'];
$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$query2 = "SELECT Voornaam, Achternaam, Email FROM gegevens WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$result2 = mysqli_query($conn, $query2)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
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
                        <li><a href="..\..\portfolio.php"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="..\..\projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="..\..\cijfers.php"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li><a href="..\..\gastenboek.php"><?php echo $lang['Gastenboek']; ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="..\..\portfolio.php"><?php echo $lang['Portfolio']; ?></a></li>
                        <li><a href="..\..\projecten.php"><?php echo $lang['Projecten']; ?></a></li>
                        <li><a href="..\..\cijfers.php"><?php echo $lang['Cijferlijst']; ?></a></li>
                        <li class="active"><a href="..\..\gastenboek.php"><?php echo $lang['Gastenboek']; ?><span class="sr-only">(current)</span></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Gastenboek wijzigen</h1>
                </div>
            </div></div>  


        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">

                    <div class="bs-callout bs-callout-danger">
                        <p>
                        <div class="form-area">  
                            <form action="#" method="POST">
                                
                                <div class="form-group">
                                    <textarea name="bericht" class="form-control" id="message" placeholder="Vul hier je bericht in" maxlength="140" rows="7"></textarea>				
                                </div>
                                <div class="form-group">
                                    <p><input type="submit" id="submit" name="submit" class="btn btn-primary pull-middle" value="<?php echo $lang['verstuur']; ?>" /></p>
                                </div>
                            </form>
                        </div>
                        <a href="berichten.php"><?php echo $lang['berichten']; ?></a>
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
<?php
if (isset($_POST['submit'])){
$TableName2 = "visitors";
$date = "NOW()";
$Voornaam = $row2['Voornaam'] ;
$Achternaam = $row2['Achternaam'];
$name = "$Voornaam $Achternaam";
$bericht = stripslashes($_POST['bericht']);
$Email = $row2['Email'];
$SQLstring2 = "INSERT INTO $TableName2 VALUES(NULL,"
    . "'$name', '$bericht', $date, '$Email')";
echo $SQLstring2;
$QueryResult2 = mysqli_query($conn, $SQLstring2);
if($QueryResult2 === FALSE)
{
echo "<p>Unable to execute the query.</p>"
. "<p>Error code " . mysqli_errno($conn)
. ": " . mysqli_error($conn) . "</p>";
} else {
echo "<meta http-equiv='refresh' content='0; url=berichten.php' />";
}
mysqli_close($conn);
}