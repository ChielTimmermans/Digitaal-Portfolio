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
if (isset($_POST['submit'])) {
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

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass2 = trim($_POST['pass2']);
    $pass2 = strip_tags($pass2);
    $pass2 = htmlspecialchars($pass2);

    if ($stnummer){
        echo "FOUT";
    }
    if (empty($stnummer)) {
        $error = true;
        $nameError = "Vul uw studentnummer in.";
    } else if (strlen($stnummer) < 6) {
        $error = true;
        $stnummerError = "Studentnummer heeft minimaal 6 karakters.";
    }

    if (empty($fname)) {
        $error = true;
        $fnameError = "Vul uw voornaam in.";
    } else if (strlen($fname) < 2) {
        $error = true;
        $fnameError = "Voornaam heeft minimaal 2 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $fname)) {
        $error = true;
        $fnameError = "Voornaam bevat alleen alfabet en geen spaties.";
    }

    if (empty($lname)) {
        $error = true;
        $lnameError = "Vul uw achternaam in.";
    } else if (strlen($lname) < 3) {
        $error = true;
        $lnameError = "Achternaam heeft minimaal 3 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $lname)) {
        $error = true;
        $lnameError = "Achternaam bevat alleen alfabetische tekens en geen spaties";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Vul een geldig email adres in.";
    } else if (empty($email)) {
        $error = true;
        $emailError = "Vul een email adres in.";
    } else {
        // check email exist or not
        $query = "SELECT Email FROM gegevens WHERE Email='$email'";
        $result = mysqli_query($query);
        $count = mysqli_num_rows($result);
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }

    if (empty($telnum)) {
        $error = true;
        $telError = "Vul uw telefoonnummer in.";
    } else if (strlen($telnum) < 8) {
        $error = true;
        $telError = "Telefoonnummer heeft minimaal 6 karakters.";
    }

    if (empty($bday)) {
        $error = true;
        $bdayError = "Vul uw geboorte datum in.";
    } else if (strlen($bday) != 10) {
        $error = true;
        $bdayError = "Vul uw geboorte datum juist in.";
    }

    if (empty($adr)) {
        $error = true;
        $adrError = "Vul uw adres in.";
    } else if (strlen($adr) < 2) {
        $error = true;
        $adrError = "Vul uw adres juist in.";
    } else if (!preg_match("/^[a-zA-Z ]+$/\s", $adr)) {
        $error = true;
        $lnameError = "Straatnaam bevat alleen alfabetische tekens.";
    }

    if (empty($hnum)) {
        $error = true;
        $hnumError = "Vul uw huisnummer in.";
    }

    if (empty($postc)) {
        $error = true;
        $postcError = "Vul uw postcode in.";
    } else if (strlen($postc) != 6) {
        $error = true;
        $postcError = "Vul een geldig postcode in.";
    } else if (!preg_match("/^[a-zA-Z0-9]+$/", $postc)) {
        $error = true;
        $lnameError = "Postcode bevat alleen alfabetische tekens, cijfers en geen spaties";
    }

    if (empty($plaats)) {
        $error = true;
        $plaatsError = "Vul uw woonplaats in.";
    } else if (strlen($plaats) < 2) {
        $error = true;
        $plaatsError = "Vul een geldige woonplaats in.";
    } else if (!preg_match("/^[a-zA-Z]+$/\s", $plaats)) {
        $error = true;
        $plaatsError = "Woonplaats bevat alleen alfabetische tekens.";
    }


    if (empty($rol)) {
        $error = true;
        $rolError = "Vul uw rol in.";
    } else if (rol(value > 3)) {
        $error = true;
        $rolError = "Vul een geldige rol in.";
    }

    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6) {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    } if ($pass !== $pass2) {
        $error = true;
        $passError2 = "password do not match.";
    }

    // password encrypt using SHA256();
    $password = hash('sha256', $pass);
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
            <span><?php echo $stnummerError; ?></span>
            <input type="password" name="pass" placeholder="Enter Password" maxlength="15" />   
            <span><?php echo $passError, $passError2; ?></span>
            <br><br>
            <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" />
            Voornaam:       <input type="text" name="voornaam" maxlength="30"><br><br>
            <span><?php echo $fnameError; ?></span>
            Achternaam:     <input type="text" name="achternaam" maxlength="60"><br><br>
            <span><?php echo $lnameError; ?></span>
            Email adres:    <input type="email" name="email" maxlength="50"><br><br>
            <span><?php echo $emailError; ?></span>
            Telefoonnummer: <input type="number" name="telnummer" maxlength="15"><br><br>
            <span><?php echo $telError; ?></span>
            Geboortedatum:  <input type="date" name="geboortedatum" maxlenth="10"><br><br>
            <span><?php echo $bdayError; ?></span>
            Straatnaam:     <input type="text" name="adres" maxlength="30"><br><br>
            <span><?php echo $adrError; ?></span>
            Huisnummer:     <input type="number" name="huisnummer" maxlength="5"><br><br>
            <span><?php echo $hnumError; ?></span>
            Postcode:       <input type="text" name="postcode" maxlength="6"><br><br>
            <span><?php echo $postcError; ?></span>
            Woonplaats:     <input type="text" name="woonplaats" maxlength="30"><br><br>
            <span><?php echo $plaatsError; ?></span>
            <input type="radio" name="gender" value="m" checked>Man
            <input type="radio" name="gender" value="f">Vrouw<br><br>
            Rol:            <input type="text" name="rol" maxlength="1"><br><br>
            <button type="submit" name="submit">Submit</button>
            <input type="reset">
            <span><?php echo $rolError; ?></span>
        </form>
    </body>
</html>