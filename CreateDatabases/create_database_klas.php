<?php
$ipadress = "localhost";
$ww = "";
$DBConnect = mysqli_connect("$ipadress", "root", "$ww");
if ($DBConnect === FALSE) {
    echo "<p>Unable to connect to the database server.</p>"
    . "<p>Error code " . mysqli_errno() . ": "
    . mysqli_error() . "</p>";
} else {
    $DBName = "Portfolio";
    if (!mysqli_select_db($DBConnect, $DBName)) {
        $SQLstring = "CREATE DATABASE $DBName";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to execute the query.</p>"
            . "<p>Error code "
            . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "<p>You are the first visitor!</p>";
        }
    }
    mysqli_select_db($DBConnect, $DBName);
    $TableName = "klas";
    $SQLstring = "SHOW TABLES LIKE '$TableName'";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0) {
        $SQLstring = "CREATE TABLE $TableName(
                    Klas            Varchar(10)  UNIQUE KEY,
                    vak             Varchar(30),
                    Studentnummer   INT(8)      UNIQUE KEY
                    )";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE) {
            echo "<p>Unable to create the table.</p>"
            . "<p>Error code "
            . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
        }
    }

    mysqli_close($DBConnect);
}

