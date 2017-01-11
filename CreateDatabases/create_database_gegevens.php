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
            if(isset($_POST['submit']))
            {       
                    $stnummer = trim($_POST['studentnummer']);
                    $stnummer = strip_tags($stnummer);
                    $stnummer = htmlspecialchars($stnummer);

                    $fname = trim($_POST['voornaam']);
                    $fname = strip_tags($fname);
                    $fname = htmlspecialchars($fname);
                    
                    $lname = trim($_POST['achternaam']);
                    $lname = strip_tags($lname);
                    $lname = htmlspecialchars($lname);
                    
                    $email = trim($_POST['email']);
                    $email = strip_tags($email);
                    
                    $telnum = trim($_POST['telnummer']);
                    $telnum = strip_tags($telnum);
                    $telnum = htmlspecialchars($telnum);
                    
                    $bday = trim($_POST['geboortedatum']);
                    $bday = strip_tags($bday);
                    $bday = htmlspecialchars($bday);
                    
                    $adr = trim($_POST['adres']);
                    $adr = strip_tags($adr);
                    
                    $hnum = trim($_POST['huisnummer']);
                    $hnum = strip_tags($hnum);
                    $hnum = htmlspecialchars($hnum);
                    
                    $postc = trim($_POST['postcode']);
                    $postc = strip_tags($postc);
                    $postc = htmlspecialchars($postc);
                    
                    $plaats = trim($_POST['woonplaats']);
                    $plaats = strip_tags($plaats);
                    $plaats = htmlspecialchars($plaats);
                    
                    $rol = trim($_POST['rol']);
                    $rol = strip_tags($rol);
                    $rol = htmlspecialchars($rol);
            }
            $DBConnect = mysqli_connect("$ipadress", "root", "$ww");
            $query = "INSERT INTO gegevens"
                    . "(userID, Studentnummer, Voornaam, Achternaam, Email, Mobielnummer, Geboortedatum, Adres, Huisnummer, Postcode, Woonplaats, Geslacht, Rol)"
                    . "VALUES (NULL, '$stnummer', '$fname', '$lname', '$email', '$telnum', '$bday', '$adr', '$hnum', '$postc', '$plaats', '$rol')"
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form>
            Studentnummer:  <input type="number" name="studentnummer" maxlength="8"><br><br>
            Voornaam:       <input type="text" name="voornaam" maxlength="30"><br><br>
            Achternaam:     <input type="text" name="achternaam" maxlength="60"><br><br>
            Email adres:    <input type="email" name="email" maxlength="50"><br><br>
            Telefoonnummer: <input type="number" name="telnummer" maxlength="15"><br><br>
            Geboortedatum:  <input type="date" name="geboortedatum" maxlenth="10"><br><br>
            Straatnaam:     <input type="text" name="adres" maxlength="30"><br><br>
            Huisnummer:     <input type="number" name="huisnummer" maxlength="5"><br><br>
            Postcode:       <input type="text" name="postcode" maxlength="6"><br><br>
            Woonplaats:     <input type="text" name="woonplaats" maxlength="30"><br><br>
            <input type="radio" name="gender" value="m" checked>Man
            <input type="radio" name="gender" value="f">Vrouw<br><br>
            Rol:            <input type="text" name="rol" maxlength="1"><br><br>
            <input type="submit"> <input type="reset">
        </form>
    </body>
</html>
