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
    $TableName = "portfoliotext";
    $SQLstring = "SHOW TABLES LIKE '$TableName'";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0) {
        $SQLstring = "CREATE TABLE $TableName(
                Studentnummer   INT        UNIQUE KEY,
                overmij             VARCHAR(1000),
                studie              VARCHAR(150),
                school              VARCHAR(150),
                Afstudeerjaar      VARCHAR(150),
                hobbies             VARCHAR(1000),
                werkervaring        VARCHAR(1000),
                avatar              VARCHAR(30)
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

?>