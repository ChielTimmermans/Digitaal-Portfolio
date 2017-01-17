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
                    < <a class="navbar-brand" href="https://stenden.com">
                    <img src="images/stenden_logo1.png" alt="Stenden Logo">
                </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="backend/student/home.html"><?php echo $lang['Instellingen'] ?></a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="#"><?php echo $lang['Taal'] ?></a></li>
                    </ul>
        </div>
      </div>
    </nav>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="portfolio.html"><?php echo $lang['Mijnportfolio'] ?><span class="sr-only">(current)</span></a></li>
                        <li><a href="projecten.html"><?php echo $lang['MijnProjecten'] ?></a></li>
			<li><a href="cijfers.html"><?php echo $lang['MijnCijferlijst'] ?></a></li>
                        <li><a href="gastenboek.html"><?php echo $lang['Gastenboek'] ?></a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header"><?php echo $lang['Mijnportfolio'] ?></h1>
                </div>
            </div></div>  


        <div class="container">
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="panel panel-default">
                    
                    <div class="bs-callout bs-callout-danger">
                        <h4>$lang['cijfersaanpassen']</h4>
							<p>SLB:</p>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Klas
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								  <li><a href="#">INF1A</a></li>
								  <li><a href="#">INF1B</a></li>
								</ul>
							</div></br>
						
							<div class="btn-group" role="group">
							<p>Informatiemanagement:</p>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Klas
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								  <li><a href="#">Henk Henk</a></li>
								  <li><a href="#">Harry Harry</a></li>
								</ul>
							</div></br>
						
							<div class="btn-group" role="group">
							<p>Test:</p>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Klas
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								  <li><a href="#">Henk Henk</a></li>
								  <li><a href="#">Harry Harry</a></li>
								</ul>
							</div></br></br></br>
							
							<div class="btn-group" role="group">
							<p>Test:</p>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Klas
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								  <li><a href="#">Henk Henk</a></li>
								  <li><a href="#">Harry Harry</a></li>
								</ul>
							</div>
							
							<div class="btn-group" role="group">
							<p>Test:</p>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Klas
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								  <li><a href="#">Henk Henk</a></li>
								  <li><a href="#">Harry Harry</a></li>
								</ul>
							</div>
							
							<div class="btn-group" role="group">
							<p>Test:</p>
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Klas
								  <span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
								  <li><a href="#">Henk Henk</a></li>
								  <li><a href="#">Harry Harry</a></li>
								</ul>
							</div></br>
                    
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