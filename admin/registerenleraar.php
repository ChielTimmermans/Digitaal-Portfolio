<?php
session_start();
ob_start();


include '..\createdatabases\dbconnect.php';
$error = false;

if (isset($_POST['submit']))
{
    $stnummer = trim($_POST['leraarnummer']);
    $stnummer = strip_tags($stnummer);
    $stnummer = htmlspecialchars($stnummer);
    
    $Voornaam = trim($_POST['voornaam']);
    $Voornaam = strip_tags($Voornaam);
    $Voornaam = htmlspecialchars($Voornaam);

    $Achternaam = trim($_POST['achternaam']);
    $Achternaam = strip_tags($Achternaam);
    $Achternaam = htmlspecialchars($Achternaam);

    $email = trim($_POST['Email']);
    $email = strip_tags($email);

    $telnum = trim($_POST['Mobielnummer']);
    $telnum = strip_tags($telnum);
    $telnum = htmlspecialchars($telnum);

    $bday = trim($_POST['Geboortedatum']);
    $bday = strip_tags($bday);
    $bday = htmlspecialchars($bday);

    $adr = trim($_POST['adres']);
    $adr = strip_tags($adr);

    $hnum = trim($_POST['Huisnummer']);
    $hnum = strip_tags($hnum);
    $hnum = htmlspecialchars($hnum);

    $postc = trim($_POST['Postcode']);
    $postc = strip_tags($postc);
    $postc = htmlspecialchars($postc);

    $plaats = trim($_POST['Woonplaats']);
    $plaats = strip_tags($plaats);
    $plaats = htmlspecialchars($plaats);

    $gender = trim($_POST['Geslacht']);
    $gender = strip_tags($gender);
    $gender = htmlspecialchars($gender);
    
    $rol = trim($_POST['Role']);
    $rol = strip_tags($rol);
    $rol = htmlspecialchars($rol);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    $pass2 = trim($_POST['pass2']);
    $pass2 = strip_tags($pass2);
    $pass2 = htmlspecialchars($pass2);

    $vak = trim($_POST['vak']);
    $vak = strip_tags($vak);
    $vak = htmlspecialchars($vak);
    
    $vak2 = trim($_POST['vak2']);
    $vak2 = strip_tags($vak2);
    $vak2 = htmlspecialchars($vak2);
    
    $vak3 = trim($_POST['vak3']);
    $vak3 = strip_tags($vak3);
    $vak3 = htmlspecialchars($vak3);

    if (empty($stnummer))
    {
        $error = true;
        $nameError = "Vul uw leraarnummer in.";
    } else if (strlen($stnummer) < 6)
    {
        $error = true;
        $stnummerError = "leraarnummer heeft minimaal 6 karakters.";
    }
    
    if (empty($Voornaam))
    {
        $error = true;
        $fnameError = "Vul uw voornaam in.";
    } else if (strlen($Voornaam) < 2)
    {
        $error = true;
        $fnameError = "Voornaam heeft minimaal 2 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $Voornaam))
    {
        $error = true;
        $fnameError = "Voornaam bevat alleen alfabet en geen spaties.";
    }

    if (empty($Achternaam))
    {
        $error = true;
        $lnameError = "Vul uw achternaam in.";
    } else if (strlen($Achternaam) < 3)
    {
        $error = true;
        $lnameError = "Achternaam heeft minimaal 3 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $Achternaam))
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

    if (empty($rol))
    {
        $error = true;
        $rolError = "Vul uw rol in.";
    } else if ($rol > 3)
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

        $query = "INSERT INTO leraren (Voornaam,Achternaam,Email,Mobielnummer,Geboortedatum,Adres,Huisnummer,Postcode,Woonplaats,Geslacht,Rol,vak,vak2,vak3) VALUES ('$Voornaam','$Achternaam','$email','$telnum','$bday','$adr','$hnum','$postc','$plaats','$gender','$rol','$vak','$vak2','$vak3')";
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
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form action="registerenleraar.php" method="post">
            Leraarnummer:<br>
            <input type="number" name="leraarnummer" maxlength="8" placeholder="Studentnummer">
            <span><?php echo $stnummerError; ?></span><br><br>
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
            <input type="email" name="Email" maxlength="50" placeholder="Emailadres">
            <span><?php echo $emailError; ?></span><br><br>
            Telefoonnummer:<br>
            <input type="number" name="Mobielnummer" maxlength="15" placeholder="Telefoonnummer">
            <span><?php echo $telError; ?></span><br><br>
            Geboortedatum:<br>
            <input type="date" name="Geboortedatum" maxlenth="10" placeholder="Geboortedatum">
            <span><?php echo $bdayError; ?></span><br><br>
            Straatnaam:<br>
            <input type="text" name="adres" maxlength="30" placeholder="Straatnaam">
            <span><?php echo $adrError; ?></span><br><br>
            Huisnummer:<br>
            <input type="number" name="Huisnummer" maxlength="5" placeholder="Huisnummer"><span><?php echo $hnumError; ?></span><br><br>
            Postcode:<br>
            <input type="text" name="Postcode" maxlength="6" placeholder="postcode">
            <span><?php echo $postcError; ?></span><br><br>
            Woonplaats:<br>
            <input type="text" name="Woonplaats" maxlength="30" placeholder="woonplaats">
            <span><?php echo $plaatsError; ?></span><br><br>
            <input type="radio" name="Gender" value="m" checked>Man
            <input type="radio" name="Gender" value="f">Vrouw<br><br>
            Rol:<br>
            <select name="Role">
                <option value ="1">Student</option>
                <option value ="2">Docent</option>
                <option value ="3">SlB'er</option>
                <option value ="4">Admin</option>
                
            </select>
            
            <button type="submit" name="submit">Submit</button>
            <input type="reset">
            <span><?php echo $rolError; ?></span>
        </form>
    </body>
</html>