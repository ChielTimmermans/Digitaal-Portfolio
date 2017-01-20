<?php
session_start();
ob_start();


include '..\createdatabases\dbconnect.php';
$error = false;

if (isset($_POST['submit']))
{
    $stnummer = trim($_POST['studentnummer']);
    $stnummer = strip_tags($stnummer);
    $stnummer = htmlspecialchars($stnummer);

    $klas = trim($_POST['Klas']);
    $klas = strip_tags($klas);
    $klas = htmlspecialchars($klas);

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
    
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass2 = trim($_POST['pass2']);
    $pass2 = strip_tags($pass2);
    $pass2 = htmlspecialchars($pass2);

    $gender = trim($_POST['gender']);
    $gender = strip_tags($gender);
    $gender = htmlspecialchars($gender);

    if (empty($stnummer))
    {
        $error = true;
        $nameError = "Vul uw studentnummer in.";
    } else if (strlen($stnummer) < 6)
    {
        $error = true;
        $stnummerError = "Studentnummer heeft minimaal 6 karakters.";
    }

    if (empty($klas))
    {
        $error = true;
        $klasError = "Vul uw klas in.";
    }

    if (empty($fname))
    {
        $error = true;
        $fnameError = "Vul uw voornaam in.";
    } else if (strlen($fname) < 2)
    {
        $error = true;
        $fnameError = "Voornaam heeft minimaal 2 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $fname))
    {
        $error = true;
        $fnameError = "Voornaam bevat alleen alfabet en geen spaties.";
    }

    if (empty($lname))
    {
        $error = true;
        $lnameError = "Vul uw achternaam in.";
    } else if (strlen($lname) < 3)
    {
        $error = true;
        $lnameError = "Achternaam heeft minimaal 3 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $lname))
    {
        $error = true;
        $lnameError = "Achternaam bevat alleen alfabetische tekens en geen spaties";
    }


    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error = true;
        $emailError = "Vul een geldig email adres in.";
    } else if (empty($email))
    {
        $error = true;
        $emailError = "Vul een email adres in.";
    } else{
        $query = "SELECT Email FROM gegevens WHERE Email='$email'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0)
        {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }

    if (empty($telnum))
    {
        $error = true;
        $telError = "Vul uw telefoonnummer in.";
    } else if (strlen($telnum) < 8)
    {
        $error = true;
        $telError = "Telefoonnummer heeft minimaal 6 karakters.";
    }

    if (empty($bday))
    {
        $error = true;
        $bdayError = "Vul uw geboorte datum in.";
    } else if (strlen($bday) != 10)
    {
        $error = true;
        $bdayError = "Vul uw geboorte datum juist in.";
    }

    if (empty($adr))
    {
        $error = true;
        $adrError = "Vul uw adres in.";
    } else if (strlen($adr) < 2)
    {
        $error = true;
        $adrError = "Vul uw adres juist in.";
    } else if (!preg_match("/^[a-zA-Z ]+$/s", $adr))
    {
        $error = true;
        $lnameError = "Straatnaam bevat alleen alfabetische tekens.";
    }

    if (empty($hnum))
    {
        $error = true;
        $hnumError = "Vul uw huisnummer in.";
    }

    if (empty($postc))
    {
        $error = true;
        $postcError = "Vul uw postcode in.";
    } else if (strlen($postc) != 6)
    {
        $error = true;
        $postcError = "Vul een geldig postcode in.";
    } else if (!preg_match("/^[a-zA-Z0-9]+$/", $postc))
    {
        $error = true;
        $lnameError = "Postcode bevat alleen alfabetische tekens, cijfers en geen spaties";
    }

    if (empty($plaats))
    {
        $error = true;
        $plaatsError = "Vul uw woonplaats in.";
    } else if (strlen($plaats) < 2)
    {
        $error = true;
        $plaatsError = "Vul een geldige woonplaats in.";
    } else if (!preg_match("/^[a-zA-Z ]+$/s", $plaats))
    {
        $error = true;
        $lnameError = "Straatnaam bevat alleen alfabetische tekens.";
    }

    {
        $error = true;
        $rolError = "Vul een geldige rol in.";
    }

// password validation
    if (empty($pass))
    {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 6)
    {
        $error = true;
        $passError = "Password must have atleast 6 characters.";
    } if ($pass !== $pass2)
    {
        $error = true;
        $passError2 = "password do not match.";
    }
//     password encrypt using SHA256();
    $password = hash('sha256', $pass);
    if (!$error)
    {

        $query = "INSERT INTO gegevens (Studentnummer,Klas,Voornaam,Achternaam,Email,Mobielnummer,Geboortedatum,Adres,Huisnummer,Postcode,Woonplaats,Geslacht,Rol,Stijl1,Stijl2,Stijl3) VALUES ('$stnummer','$klas','$fname','$lname','$email','$telnum','$bday','$adr','$hnum','$postc','$plaats','$gender','1',1,1,1)";
        $res = mysqli_query($conn, $query);
        $query2 = "INSERT INTO users (Studentnummer,userEmail,userPass) VALUES ('$stnummer', '$email', '$password')";
        $res2 = mysqli_query($conn, $query2);

        if ($res)
        {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
        } else
        {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later..";
        }
        if ($res2)
        {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
        } else
        {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later..";
        }
    }
    // create table voor de user
//    $SQLstring3 = "CREATE TABLE $user (userID AUTO_INCREMENT PRIMARY KEY, "
//            . "studentNummer INT(10) NOT NULL, "
//            . "klas VARCHAR(6) NOT NULL, "
//            . "voornaam VARCHAR(25) NOT NULL, "
//            . "achternaam VARCHAR(25) NOT NULL, "
//            . "email VARCHAR(100) NOT NULL, "
//            . "telnummer INT(15) NOT NULL, "
//            . "geboortedatum DATE() NOT NULL, "
//            . "adres VARCHAR(30) NOT NULL, "
//            . "huisnummer INT(4) NOT NULL, "
//            . "postcode VARCHAR(6) NOT NULL, "
//            . "woonplaats VARCHAR(25) NOT NULL, "
//            . "gender VARCHAR(1) NOT NULL, "
//            . "vakCode VARCHAR(10) NOT NULL, "
//            . "studieonderdelen VARCHAR(30) NOT NULL, "
//            . "vakcijfer INT(3) NOT NULL, "
//            . "ec INT(1) NOT NULL)";
//    

    // create table met naam van studentnumemr
    // veritcaal vakken
    // aarachter cijfers
   $DBConnect = mysqli_connect('localhost', 'root', '');
   $DBName = 'portfolio';
   mysqli_select_db($DBConnect, $DBName);
    $TableName = "s" . $stnummer;
    $SQLstring = "SHOW TABLES LIKE '$TableName'";
    $QueryResult = mysqli_query($DBConnect, $SQLstring);
    if (mysqli_num_rows($QueryResult) == 0)
    {
        $SQLstring = "CREATE TABLE $TableName(
            vakCode VARCHAR(10) PRIMARY KEY,
            vakNaam VARCHAR(50),
            cijfer VARCHAR(4),
            EC VARCHAR(4),
            vakDocent VARCHAR(30))";
        echo $SQLstring;
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if ($QueryResult === FALSE)
        {
            echo "<p>Unable to create the table.</p>"
            . "<p>Error code "
            . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
        }
    }
        $array = array(
        array('vakCode', 'vakNaam', 'EC' ),
        array('OIIM', 'Informatiemanagemnt', '3.0'),
        array('OIPHP1', 'PHP', '3.0'),
        array('OIDGD1', 'Digital Graphic Design 1', '3.0'),
        array('IIPR1', 'Project Professionele Website', '3.0'),
        array('GMOCO1', 'Mondelinge communicatie 1', '3.0'),
        array('OIDB1', 'Databases 1', '3.0'),
        array('OIPHP2', 'Unleash your Potential in PHP', '3.0'),
        array('GSLB1A', 'Studieloopbaanbegeleiding 1A', '3.0'),
        array('IIPR2', 'Project Digitale Portfolio', '3.0'),
        array('GSCOT1', 'Schriftelijke Communicatie', '3.0'),
        array('OIJV1', 'Java 1', '3.0'),
        array('OICN1', 'Computernetwerken 1', '3.0'),
        array('OIWIS', 'Inleiding Wiskunde', '3.0'),
        array('IIPR3', 'Project Solar Bot', '3.0'),
        array('GSLB1B', 'Studieloopbaanbegeleiding 1B', '3.0'),
        array('OIC#1', 'C# 1', '3.0'),
        array('OIMM', 'Multimedia Productie', '3.0'),
        array('IIPR4B', 'Project Stenden Creative - Realization', '3.0')
         );

        $fields = implode(',', array_shift($array)); // take the field names off the start of the array

        $data = array();
        foreach($array as $row) {
            $vakCode = mysql_real_escape_string($row[0]);
            $vakNaam = mysql_real_escape_string($row[1]);
            $vakDocent = mysql_real_escape_string($row[2]);
            $data[] = "('$vakCode', '$vakNaam', '$vakDocent')";
        }
        $values = implode(',', $data);

        $sql = "INSERT INTO $TableName ($fields) VALUES $values";
        $sqlres = mysqli_query($DBConnect, $sql);
        if ($sqlres === FALSE) {
            echo "<p>Unable to execute the query.</p>"
            . "<p>Error code " . mysqli_errno($DBConnect)
            . ": " . mysqli_error($DBConnect) . "</p>";
        } else {
            echo "Gelukt";
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form action="registerengegevens.php" method="post">
            Studentnummer:<br>
            <input type="number" name="studentnummer" maxlength="8" placeholder="Studentnummer">
            <span><?php echo $stnummerError; ?></span><br><br>
            Klas:<br>
            <input type="text" name="Klas" maxlength="10" placeholder="Klas">
            <span><?php echo $klasError; ?></span><br><br>
            Wachtwoord:<br>
            <input type="password" name="pass" placeholder="Enter Password" maxlength="15" />   
            <span><?php echo $passError, $passError2; ?></span>
            <br><br>
            Wachtwoord herhalen:<br>
            <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" />
            <br><br>
            Voornaam:<br>
            <input type="text" name="voornaam" maxlength="30" placeholder="voornaam">
            <span><?php echo $fnameError; ?></span><br><br>
            Achternaam:<br>
            <input type="text" name="achternaam" maxlength="60" placeholder="achternaam">
            <span><?php echo $lnameError; ?></span><br><br>
            Email adres:<br>
            <input type="email" name="email" maxlength="50" placeholder="Emailadres">
            <span><?php echo $emailError; ?></span><br><br>
            Telefoonnummer:<br>
            <input type="number" name="telnummer" maxlength="15" placeholder="Telefoonnummer">
            <span><?php echo $telError; ?></span><br><br>
            Geboortedatum:<br>
            <input type="date" name="geboortedatum" maxlenth="10" placeholder="Geboortedatum">
            <span><?php echo $bdayError; ?></span><br><br>
            Straatnaam:<br>
            <input type="text" name="adres" maxlength="30" placeholder="Straatnaam">
            <span><?php echo $adrError; ?></span><br><br>
            Huisnummer:<br>
            <input type="number" name="huisnummer" maxlength="5" placeholder="Huisnummer"><span><?php echo $hnumError; ?></span><br><br>
            Postcode:<br>
            <input type="text" name="postcode" maxlength="6" placeholder="postcode">
            <span><?php echo $postcError; ?></span><br><br>
            Woonplaats:<br>
            <input type="text" name="woonplaats" maxlength="30" placeholder="woonplaats">
            <span><?php echo $plaatsError; ?></span><br><br>
            <input type="radio" name="gender" value="m" checked>Man
            <input type="radio" name="gender" value="f">Vrouw<br><br>
            <button type="submit" name="submit">Submit</button>
            <input type="reset">
            <span><?php echo $rolError; ?></span>
        </form>
    </body>
</html>