<?php 
    session_start();
    ob_start();


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
    }
    
    $leraarnummer = $_SESSION['leraar'];
    echo $leraarnummer;
    if ($leraarnummer === ""){
        echo "wrong";
    }
    
    if(!$error){
        $query = "INSERT INTO leraren Where Lerarennummer = $leraarnummer (vak,vak2,vak3) VALUES ('$vak','$vak2','$vak3')";
        $res = mysqli_query($conn, $query);
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

$vak = "";
$vak2 = "";
$vak3 = "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        <form action="registerenleraarvak.php" method="post">
            Vak: <br>
            <select 
        <?php if (!$vak){
            echo 'name="vak"';
        }elseif (!$vak2){
            echo 'name="vak2"';
        }elseif (!$vak3){
            echo 'name="vak3"';
        }?> >
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
            <br><br>
            <button type="submit" name="add">voeg een nieuw vak toe</button>
            <input type="reset">
        </form>
    </body>
</html>