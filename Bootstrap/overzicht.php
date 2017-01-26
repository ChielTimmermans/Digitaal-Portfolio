<?php
session_start();
if (!isset($_GET['Studentnummer']) || empty($_GET)) {
    $portnummer = $_SESSION['user'];
} else {
    $portnummer = $_GET['Studentnummer'];
}
require_once '..\createDatabases\dbconnect.php';
include '..\functions\common.php';
include '..\databaseArray.php';
if (!isset($_SESSION['user'])) {
    header("Location: .index.php");
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

        <!-- Bootstrap core CSS -->
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="ssets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dist/css/signin.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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

        <div class="container">
            <div class="jumbotron2">

                <div class="row">
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
                    ?>

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
                    
                        foreach ($column2 as $res2) {
                            echo
                            "<div class='col-md-2 col-sm-6 col-xs-6'>
                                <div class='panel panel-default'>
                                    <div class='panel-body'>                    
                                        <img class='img-circle img-responsive' alt='Dennis' src='dist/css/images/profileblank.png'>
                                        <p><a href='portfolio.php?student=" . $res2 . "'> $res2 </a></p>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                    
                    ?>
                    

                </div>
            </div>
        </div>
        <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
