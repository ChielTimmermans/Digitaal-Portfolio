
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
                $TableName = "role";
                $SQLstring = "SHOW TABLES LIKE '$TableName'";
                $QueryResult = mysqli_query($DBConnect, $SQLstring);
                if (mysqli_num_rows($QueryResult) == 0) {
                    $SQLstring = "CREATE TABLE $TableName(
                    userID          SMALLINT,
                    Rol             INT(11),
                    permission      Varchar(30)
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form>
            Username:      <input type="text" name="username" value="name"><br><br>
            Studentnummer: <input type="number" name="studentnummer" value="number"><br><br>
            Voornaam:      <input type="text" name="voornaam" value="fname"><br><br>
            Achternaam:    <input type="text" name="achternaam" value="lname"><br><br>
            Email adres:   <input type="email" name="email" value="email"><br><br>
            Telefoonnummer:<input type="number" name="telnummer" value="telnumber"><br><br>
            Geboortedatum: <input type="date" name="geboortedatum" value="bdate"><br><br>
            Adres:         <input type="text" name="adres" value="adres"><br><br>
            Huisnummer:    <input type="number" name="huisnummer" value="adres"><br><br>
            Postcode:      <input type="text" name="postcode" value="postcode"><br><br>
            Woonplaats:    <input type="text" name="woonplaats" value="city"><br><br>
            <input type="radio" name="gender" value="m" checked>Man
            <input type="radio" name="gender" value="f">Vrouw<br><br>
            Rol:           <input type="text" name="rol" value="role">
        </form>
    </body>
</html>