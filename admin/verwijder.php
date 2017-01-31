<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
    </head>
    <body>
        <form action="#" method="post" class="form-horizontal">
            <button type="submit" name="submit">verwijder</button>
        </form>
    </body>
</html>
<?php
include '..\createdatabases\dbconnect.php';
$nummer = $_GET['nummer'];
$sql = "SELECT Voornaam, Achternaam FROM gegevens where studentnummer ='$nummer'";
$result = mysqli_query($conn, $sql)
        or die("Error: " . mysqli_error($conn));
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

if ($row['Voornaam'] === ""){
   $sql = "SELECT Voornaam, Achternaam FROM leraren where Lerarennummer ='$nummer'";
}
}
$result = mysqli_query($conn, $sql)
        or die("Error: " . mysqli_error($conn));
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $naam = $row['Voornaam'];
    $achternaam = $row['Achternaam'];
    echo "weet u zeker dat u van $naam $achternaam alles wilt verwijderen?";
}
if(isset($_POST['submit'])){
    $sql1 = "DELETE FROM users WHERE studentnummer='$nummer'";
    $sql2 = "DELETE FROM cijfer WHERE studentnummer='$nummer'";
    $sql3 = "DELETE FROM gegevens WHERE studentnummer='$nummer'";
    $sql4 = "DELETE FROM leraren WHERE studentnummer='$nummer'";
    $sql5 = "DELETE FROM portfoliotext WHERE studentnummer='$nummer'";
    $sql6 = "DELETE FROM projectcijfer WHERE studentnummer='$nummer'";
    $sql7 = "DELETE FROM projecten WHERE studentnummer='$nummer'";
    $sql8 = "DELETE FROM visitors WHERE name='$naam $achternaam'";
    echo $sql8;
    mysqli_query($conn, $sql1);
    mysqli_query($conn, $sql2);
    mysqli_query($conn, $sql3);
    mysqli_query($conn, $sql4);
    mysqli_query($conn, $sql5);
    mysqli_query($conn, $sql6);
    mysqli_query($conn, $sql7);
    mysqli_query($conn, $sql8);
    
}
?>
