
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
                $TableName = "gegevens";
                $SQLstring = "SHOW TABLES LIKE '$TableName'";
                $QueryResult = mysqli_query($DBConnect, $SQLstring);
                if (mysqli_num_rows($QueryResult) == 0) {
                    $SQLstring = "CREATE TABLE $TableName(
                    userID          SMALLINT,
                    Studentnummer   INT(8),
                    Voornaam        Varchar(30),
                    Achternaam      Varchar(60),
                    Email           Varchar(50),
                    Mobielnummer    Int(15),
                    Geboortedatum   Date,
                    Adres           Varchar(30),
                    Huisnummer      INT(5),
                    Postcode        varchar(6),
                    Woonplaats      varchar(30),
                    Geslacht        ENUM('M','F'),
                    Rol             int,
                    Stijl1          int,
                    Stijl2          int,
                    Stijl3          int)";
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
