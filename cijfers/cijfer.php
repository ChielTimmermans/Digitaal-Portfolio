<?php

$DBConnect = mysqli_connect("127.0.0.1", "root", "");
if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_errno() . ": "
    . mysqli_error() . "</p>";
} else {
    $DBName = "cijfer";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        $SQLstring = "CREATE DATABASE $DBName";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>"
            . "<p>Error code "
            . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
        }
    }
    mysqli_select_db($DBConnect, $DBName);
    $TableName = "cijfers";
    $SQLstring = "SHOW TABLES LIKE '$TableName'";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0) {
        $SQLstring = "CREATE TABLE $TableName(
                                ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                                DATE VARCHAR(25) NOT NULL,
                                cijfer INT(3) NOT NULL,
                                studentnummer INT(10) NOT NULL,
                                vak VARCHAR(25) NOT NULL)";

        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to create the table.</p>"
            . "<p>Error code "
            . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
        }
    }

    $cijfer = 9; // Ophalen cijfer moet nog toegevoegd worden
    $date = "NOW()";
    $user = "123456"; //Moet nog veranderd worden.
    $studentnmr = $user;
    $vak = 'OIIM'; // Ophalen vak moet nog toegevoegd worden.

    $SQLstring2 = "INSERT INTO $TableName VALUES(NULL, $date, $cijfer, $studentnmr, '$vak')";
    $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
    if ($QueryResult2 === FALSE) {
        echo "<p>Unable to execute the query.</p>"
        . "<p>Error code " . mysqli_errno($DBConnect)
        . ": " . mysqli_error($DBConnect) . "</p>";
    } else {
        echo "Gelukt";
    }
    mysqli_close($DBConnect);
}
        