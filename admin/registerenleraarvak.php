<?php
session_start();
ob_start();

//if (!isset($_SESSION['user'])) {
//    header("Location: index.php");
//    exit;
//}
//if(isset($_SESSION['user'])){
//    
//    
//}

if (!isset($_SESSION['leraar'])) {
    header("Location: registerenleraar.php");
    exit;
}



include '..\createdatabases\dbconnect.php';
$error = false;
$leraarnummer = $_SESSION['leraar'];
echo $leraarnummer;
if ($leraarnummer === "") {
    echo "wrong";
}



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



    $leraarnummer = $_SESSION['leraar'];
    echo $leraarnummer;
    if ($leraarnummer === "") {
        $error = true;
        echo "wrong";
    }

    if (!$error) {
        $query = "INSERT INTO leraren Where Lerarennummer = $leraarnummer (vak) VALUES ('$vak')";
        $res = mysqli_query($conn, $query);
    }
}






//$query = "INSERT INTO leraren (Voornaam,Achternaam,Email,Mobielnummer,Geboortedatum,Adres,Huisnummer,Postcode,Woonplaats,Geslacht,Rol,vak,vak2,vak3) VALUES ('$Voornaam','$Achternaam','$email','$telnum','$bday','$adr','$hnum','$postc','$plaats','$gender','$rol','$vak','$vak2','$vak3')";
//$res = mysqli_query($conn, $query);
//$query2 = "INSERT INTO users (Studentnummer,userEmail,userPass) VALUES ('$stnummer', '$email', '$password')";
//$res2 = mysqli_query($conn, $query2);
//
//if ($res) {
//    $errTyp = "success";
//    $errMSG = "Successfully registered, you may login now";
//} else {
//    $errTyp = "danger";
//    $errMSG = "Something went wrong, try again later..";
//}
//if ($res2) {
//    $errTyp = "success";
//    $errMSG = "Successfully registered, you may login now";
//} else {
//    $errTyp = "danger";
//    $errMSG = "Something went wrong, try again later..";
//}
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
        <form action="registerenleraarvak.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-md-4 control-label" for="vak">Selecteer een vak</label>
                <div class="col-md-4">
                    <select id="blood_group" name="vak" class="form-control">
                        <option value ="1">Informatiemanagement1</option>
                        <option value ="2">Inleiding Programmeren in PHP</option>
                        <option value ="3">HTML en CSS</option>
                        <option value ="4">Digital Graphic Design 1</option>
                        <option value ="5">Project Professionele Website</option>
                        <option value ="6">Mondelinge communicatie 1</option>
                        <option value ="7">Databases 1</option>
                        <option value ="8">Unleash your Potential in PHP</option>
                        <option value ="9">Studieloopbaanbegeleiding 1a</option>
                        <option value ="10">Project Stenden Support Desk</option>
                        <option value ="11">Schriftelijke Communicatie 1</option>
                        <option value ="12">Java 1</option>
                        <option value ="13">Computernetwerken 1</option>
                        <option value ="14">Inleiding Wiskunde</option>
                        <option value ="15">Project Solar Bot</option>
                        <option value ="16">Studieloopbaanbegeleiding 1b</option>
                        <option value ="17">C# 1</option>
                        <option value ="18">Multimedia Productie</option>
                        <option value ="19">Project Stenden Creative</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="signup"></label>
                <div class="col-md-4">
                    <button type="submit" id="signup" name="add" class="btn btn-success">Voeg toe</button>
                </div>
            </div>

        </form>
    </body>
</html>