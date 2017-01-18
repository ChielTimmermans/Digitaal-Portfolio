<?php

include_once 'createDatabases\dbconnect.php';
//$user = $_SESSION['user'];

//$portnummer = $_GET['Studentnummer'];

$query = "SELECT * FROM gegevens WHERE studentnummer = '$portnummer'";
$result = mysqli_query($conn, $query)
        or die("Error: " . mysqli_error($conn));
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$userEmail = $row['Email'];
$userNaam = $row['Voornaam'];
$userAchterNaam = $row['Achternaam'];
$userStudentNummer = $row['Studentnummer'];
$userMobielNummer = $row['Mobielnummer'];
$userAdres = $row['Adres'];
$userHuisNummer = $row['Huisnummer'];
$userPostcode = $row['Postcode'];
$userWoonplaats = $row['Woonplaats'];
$userGeslacht = $row['Geslacht'];
$userRol = $row['Rol'];
$huisstijl1 = $row['Stijl1'];
$huisstijl2 = $row['Stijl2'];
$huisstijl3 = $row['Stijl3'];
?>