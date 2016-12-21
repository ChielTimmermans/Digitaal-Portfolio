<!DOCTYPE>
<html>
    <head>
        <title>inloggen</title>
    </head>
    <body>
        <?php
        
            $DBConnect = mysqli_connect("127.0.0.1", "root", "");
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
                $TableName = "users";
                $SQLstring = "SHOW TABLES LIKE '$TableName'";
                $QueryResult = mysqli_query($DBConnect, $SQLstring);
                if (mysqli_num_rows($QueryResult) == 0) {
                    $SQLstring = "CREATE TABLE $TableName(userID
                    SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                    userName varchar(30),
                    userPass Varchar(255),
                    userEmail Varchar(60) UNIQUE KEY)";
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
    </body>
</html>
