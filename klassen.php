<?php
include 'databaseArray.php';

$query = "SELECT DISTINCT Klas FROM gegevens ORDER BY Klas ASC";
$result = mysqli_query($conn, $query);

//Column 'Klas' omgezet naar een array.
$column = array();
while ($row = mysqli_fetch_array($result))
{
    $column[] = $row[Klas];
}
//Elke klas apart
foreach ($column as $klassen)
{

    echo $klassen;
    $query = "SELECT Studentnummer FROM gegevens WHERE Klas='$klassen'";
    $result = mysqli_query($conn, $query);
    //Elke leerling van een klas krijgen
    while ($row2 = mysqli_fetch_array($result))
    {
        $column2[] = $row2[Studentnummer];
    }
    foreach ($column2 as $studenten)
    {
        echo "&nbsp;";
        $query = "SELECT Voornaam, Achternaam FROM gegevens WHERE Studentnummer='$studenten'";
        $result = mysqli_query($conn, $query);
        //Naam van leerlingen krijgen
        while ($row3 = mysqli_fetch_array($result))
        {
            $a = 0;
            $Voornaam = $row3[Voornaam];
            $Achternaam = $row3[Achternaam];
            $column3[$a] = "$Voornaam $Achternaam";
            $a++;
        }
        //naam van leerlingen met link
        foreach ($column3 as $namen)
        {
            echo "<a href=Bootstrap/portfolio.php?Studentnummer=$studenten>$namen</a>";
        }
    }
    unset($column2);
    echo "<br>";
}
?>                                     