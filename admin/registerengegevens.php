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
    } else
    {
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
        $query3 = "INSERT INTO portfoliotext (Studentnummer,overmij,diplomas,hobbies,werkervaring,avatar) VALUES ('$stnummer', 'Voer text in', 'Voer op de volgende manier de text in: komt nog', 'Voer hier text in', 'Voer text in', 'leeg_profielfoto.jpg')";
        $res3 = mysqli_query($conn, $query3);
        $query4 = "INSERT INTO cijfer (studentnummer,Informatiemanagement,PHP,HTML_en_CSS,Digital_Graphic_Design_1,Project_Professionele_Website,Mondelinge_communicatie_1,Databases_1,Unleash_your_Potential_in_PHP,Studieloopbaanbegeleiding_1A,Project_Digitale_Portfolio,Schriftelijke_Communicatie,Java_1,Computernetwerken_1,Inleiding_Wiskunde,Project_Solar_Bot,Studieloopbaanbegeleiding_1B,Csharp_1,Multimedia_Productie,Project_Stenden_Creative_Realization) VALUES ('$stnummer','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-')";
        $res4 = mysqli_query($conn, $query4);
        $query5 = "INSERT INTO projecten (Studentnummer,Projecttitel1,Projectcontent1,Projecttitel2,Projectcontent2,Projecttitel3,Projectcontent3,Projecttitel4,Projectcontent4) VALUES ('$stnummer','0','0','0','0','0','0','0','0')";
        $res5 = mysqli_query($conn, $query5);
               
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
            <form action="registerengegevens.php" method="post">
                Studentnummer:<br>
                <input type="number" name="studentnummer" maxlength="8" placeholder="Studentnummer" value="<?php echo $stnummer; ?>"/>
                <span><?php echo $stnummerError; ?></span><br><br>
                Klas:<br>
                <input type="text" name="Klas" maxlength="10" placeholder="Klas" value="<?php echo $klas; ?>"/>
                <span><?php echo $klasError; ?></span><br><br>
                Wachtwoord:<br>
                <input type="password" name="pass" placeholder="Enter Password" maxlength="15"/>   
                <span><?php echo $passError, $passError2; ?></span>
                <br><br>
                Wachtwoord herhalen:<br>
                <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15"/>
                <br><br>
                Voornaam:<br>
                <input type="text" name="voornaam" maxlength="30" placeholder="voornaam"  value="<?php echo $fname; ?>"/>
                <span><?php echo $fnameError; ?></span><br><br>
                Achternaam:<br>
                <input type="text" name="achternaam" maxlength="60" placeholder="achternaam" value="<?php echo $lname; ?>"/>
                <span><?php echo $lnameError; ?></span><br><br>
                Email adres:<br>
                <input type="email" name="email" maxlength="50" placeholder="Emailadres" value="<?php echo $email; ?>"/>
                <span><?php echo $emailError; ?></span><br><br>
                Telefoonnummer:<br>
                <input type="number" name="telnummer" maxlength="15" placeholder="Telefoonnummer" value="<?php echo $telnum; ?>"/>
                <span><?php echo $telError; ?></span><br><br>
                Geboortedatum:<br>
                <input type="date" name="geboortedatum" maxlenth="10" placeholder="Geboortedatum"  value="<?php echo $bday; ?>"/>
                <span><?php echo $bdayError; ?></span><br><br>
                Straatnaam:<br>
                <input type="text" name="adres" maxlength="30" placeholder="Straatnaam"  value="<?php echo $adr; ?>"/>
                <span><?php echo $adrError; ?></span><br><br>
                Huisnummer:<br>
                <input type="number" name="huisnummer" maxlength="5" placeholder="Huisnummer" value="<?php echo $hnum; ?>"/>
                <span><?php echo $hnumError; ?></span><br><br>
                Postcode:<br>
                <input type="text" name="postcode" maxlength="6" placeholder="postcode" value="<?php echo $postc; ?>"/>
                <span><?php echo $postcError; ?></span><br><br>
                Woonplaats:<br>
                <input type="text" name="woonplaats" maxlength="30" placeholder="woonplaats" value="<?php echo $plaats; ?>"/>
                <span><?php echo $plaatsError; ?></span><br><br>
            <input type="radio" name="gender" value="m" checked>Man
            <input type="radio" name="gender" value="f">Vrouw<br><br>
            <button type="submit" name="submit">Submit</button>
            <input type="reset">
        </form>
    </body>
</html>