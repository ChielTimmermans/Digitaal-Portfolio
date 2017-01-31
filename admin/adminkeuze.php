<?php
session_start();
if (($_SESSION['Rol']) != "4"){
    header("Location: ..\index.php");
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
        <link rel="icon" href="../Bootstrap/dist/css/images/favicon.ico">

        <title>Portfolio | Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../Bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="admin.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../Bootstrap/assets/js/ie-emulation-modes-warning.js"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">
            <div class="col-sm-12">

                <div class="bs-calltoaction bs-calltoaction-default">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Registreer gegevens</h1>
                            <div class="cta-desc">
                                <p>Registreer de gegevens van een gebruiker</p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="registerengegevens.php" class="btn btn-lg btn-block btn-default">Registreer gegevens</a>
                        </div>
                    </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-primary">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Registreer een medewerker</h1>
                            <div class="cta-desc">
                                <p>Registreer de volgende gebruikers:</p>
                                <p>Leraar.</p>
                                <p>SLB'er.</p>
                                <p>Admin</p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="registerenleraar.php" class="btn btn-lg btn-block btn-primary">Registreer</a>
                        </div>
                    </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-info">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Registreer leraar vak</h1>
                            <div class="cta-desc">
                                <p>Om een vak te registreren</p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="registerenleraarvak.php" class="btn btn-lg btn-block btn-info">Registreer vak</a>
                        </div>
                    </div>
                </div>

                <div class="bs-calltoaction bs-calltoaction-warning">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Verwijder een gebruiker</h1>
                            <div class="cta-desc">
                                <p>Verwijder een gebruiker met al zijn content</p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="verwijderuser.php" class="btn btn-lg btn-block btn-warning">verwijder user</a>
                        </div>
                    </div>
                </div>
                
                


                <p>
                    <a href="../Bootstrap/index.php" role="button" class="btn btn-default btn-lg">Uitloggen</a>
                </p>
                
            </div>
        </div>


                <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
                <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
                </body>
                </html>
