<?php
include 'databaseArray.php';

$query = "SELECT DISTINCT Klas FROM gegevens ORDER BY Klas ASC";
$result = mysqli_query($conn, $query);

$column = array();
while ($row = mysqli_fetch_array($result))
{
    $column[] = $row[Klas];
}
foreach ($column as $klassen)
{

    echo $klassen;
    $query = "SELECT Studentnummer FROM gegevens WHERE Klas='$klassen'";
    $result = mysqli_query($conn, $query);
    while ($row2 = mysqli_fetch_array($result))
    {
        $column2[] = $row2[Studentnummer];
    }
    foreach ($column2 as $studenten)
    {
        echo "&nbsp;";
        $query = "SELECT Voornaam, Achternaam FROM gegevens WHERE Studentnummer='$studenten'";
        $result = mysqli_query($conn, $query);
        while ($row3 = mysqli_fetch_array($result))
        {
            $a = 0;
            $Voornaam = $row3[Voornaam];
            $Achternaam = $row3[Achternaam];
            $column3[$a] = "$Voornaam $Achternaam";
            $a++;
        }
        foreach ($column3 as $namen){
            echo "<a href=Bootstrap/portfolio.php?Studentnummer=$studenten>$namen</a>";
        }
    }
    unset($column2);
    echo "<br>";
}
?>                                     