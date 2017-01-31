<?php
session_start();
if (($_SESSION['Rol']) != "4"){
    header("Location: ..\index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../Bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->

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
            <div class="row">
                <div class="span5">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>Gebruikersnaam</th>
                                <th>Verwijder gebruiker</th>                                      
                            </tr>
                        </thead>   
                        <tbody>
                            <?php
                            include_once '..\CreateDatabases/dbconnect.php';
                            $sql = "SELECT userEmail, Studentnummer FROM users";
                            $result = mysqli_query($conn, $sql)
                                    or die("Error: " . mysqli_error($conn));
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                echo "<tr><td>";
                                echo $row['userEmail'];
                                echo "</td><td>";
                                $nummer = $row['Studentnummer'];
                                echo "<a href='verwijder.php?nummer=$nummer'>verwijder deze gebruiker</a>";
                                echo "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>