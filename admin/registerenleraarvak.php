<?php
session_start();
ob_start();;
if (($_SESSION['Rol']) != "4"){
    header("Location: ..\index.php");
}


include '..\createdatabases\dbconnect.php';
$error = false;

if (isset($_POST['submit'])) {
    $vak = trim($_POST['vak']);
    $vak = strip_tags($vak);
    $vak = htmlspecialchars($vak);

    $vak2 = trim($_POST['vak2']);
    $vak2 = strip_tags($vak2);
    $vak2 = htmlspecialchars($vak2);

    $vak3 = trim($_POST['vak3']);
    $vak3 = strip_tags($vak3);
    $vak3 = htmlspecialchars($vak3);

    $leraarnummer = trim($_POST['leraar']);
    $leraarnummer = strip_tags($leraarnummer);
    $leraarnummer = htmlspecialchars($leraarnummer);

    if (!$error) {
        $query = "UPDATE leraren SET vak='$vak' Where Lerarennummer = '$leraarnummer' ";
        $res = mysqli_query($conn, $query);
    }
}
$sql = "SELECT Lerarennummer, Voornaam, Achternaam FROM leraren";
$result = mysqli_query($conn, $sql)
        or die("Error: " . mysqli_error($conn));
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
        <form action="#" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-md-4 control-label" for="vak">Selecteer een leraar</label>
                <div class="col-md-4">
                    <select id="blood_group" name="leraar" class="form-control">
                        <?php
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $leraar = $row['Lerarennummer'];
                            echo "<option value ='$leraar'>";
                            echo $row['Voornaam'];
                            echo " ";
                            echo $row['Achternaam'];
                            echo "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="vak">Selecteer een vak</label>
                <div class="col-md-4">
                    <select id="blood_group" name="vak" class="form-control">
                        <option value ="Informatiemanagement">Informatiemanagement1</option>
                        <option value ="PHP">Inleiding Programmeren in PHP</option>
                        <option value ="HTML_en_CSS">HTML en CSS</option>
                        <option value ="Digital_Graphic_Design_1">Digital Graphic Design 1</option>
                        <option value ="Project_Professionele_Website">Project Professionele Website</option>
                        <option value ="Mondelinge_communicatie_1">Mondelinge communicatie 1</option>
                        <option value ="Databases_1">Databases 1</option>
                        <option value ="Unleash_your_Potential_in_PHP">Unleash your Potential in PHP</option>
                        <option value ="Studieloopbaanbegeleiding_1A">Studieloopbaanbegeleiding 1a</option>
                        <option value ="Project_Digitale_Portfolio">Project Stenden Support Desk</option>
                        <option value ="Schriftelijke_Communicatie">Schriftelijke Communicatie 1</option>
                        <option value ="Java_1">Java 1</option>
                        <option value ="Computernetwerken_1">Computernetwerken 1</option>
                        <option value ="Inleiding_Wiskunde">Inleiding Wiskunde</option>
                        <option value ="Project_Solar_Bot">Project Solar Bot</option>
                        <option value ="Studieloopbaanbegeleiding_1B">Studieloopbaanbegeleiding 1b</option>
                        <option value ="Csharp_1">C# 1</option>
                        <option value ="Multimedia_Productie">Multimedia Productie</option>
                        <option value ="Project_Stenden_Creative_Realization">Project Stenden Creative</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="signup"></label>
                <div class="col-md-4">
                    <button type="submit" id="signup" name="submit" class="btn btn-success">Voeg toe</button>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="signup"></label>
                <div class="col-md-4">
                    <a href="adminkeuze.php" class="btn btn-success">Terug naar het keuze menu</a>
                </div>
            </div>

        </form>
    </body>
</html>