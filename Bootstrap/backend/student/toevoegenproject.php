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
                        <li><a href="#">Instellingen</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">English</a></li>
                        <li><a href="../../uitlogscherm.html">Uitloggen</a></li>
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
                        <li><a href="#">Portfolio</a></li>
                        <li class="active"><a href="#">Projecten <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Cijferlijst</a></li>
                        <li><a href="#">Gastenboek</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Project toevoegen</h1>
                </div>
            </div></div>  
        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">

                    <div class="bs-callout bs-callout-danger">
                        <form class="form-horizontal">
                            
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Naam van project</label>  
                                    <div class="col-md-4">
                                        <input id="textinput" name="project" type="text" placeholder="Naam van project" class="form-control input-md" required>
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textarea">Beschrijving van het project</label>  
                                    <div class="col-md-4">
                                        <textarea name="beschrijving" placeholder="Beschrijving project" required rows="10" cols="32"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <button id="button1id" name="submit" class="btn btn-success pull-right">Toevoegen</button>
                                    </div>
                                </div>
                        </form>
                        <a href="projecten.html">&#8592;</a>
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
