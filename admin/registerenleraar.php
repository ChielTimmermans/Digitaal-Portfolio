<?php
session_start();
ob_start();


include '..\createdatabases\dbconnect.php';
$error = false;

if (isset($_POST['submit'])) {
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

    $slb = 'n';
    if (isset($_POST['slb'])) {
        if ($_POST['slb'] == 'yes') {
            $slb = 'y';
        }
    }

    if (empty($stnummer)) {
        $error = true;
        $nameError = "Vul uw leraarnummer in.";
    } else if (strlen($stnummer) < 6) {
        $error = true;
        $stnummerError = "leraarnummer heeft minimaal 6 karakters.";
    }

    if (empty($Voornaam)) {
        $error = true;
        $fnameError = "Vul uw voornaam in.";
    } else if (strlen($Voornaam) < 2) {
        $error = true;
        $fnameError = "Voornaam heeft minimaal 2 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $Voornaam)) {
        $error = true;
        $fnameError = "Voornaam bevat alleen alfabet en geen spaties.";
    }

    if (empty($Achternaam)) {
        $error = true;
        $lnameError = "Vul uw achternaam in.";
    } else if (strlen($Achternaam) < 3) {
        $error = true;
        $lnameError = "Achternaam heeft minimaal 3 karakters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/", $Achternaam)) {
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
        $query2 = "SELECT Email FROM gegevens WHERE Email='$email'";
        $result2 = mysqli_query($conn, $query2);
        $count = mysqli_num_rows($result2);
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
    } else if (!preg_match("/^[a-zA-Z ]+$/s", $adr)) {
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
    } else if (!preg_match("/^[a-zA-Z ]+$/s", $plaats)) {
        $error = true;
        $lnameError = "Straatnaam bevat alleen alfabetische tekens.";
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







//     password encrypt using SHA256();
    $password = hash('sha256', $pass);


    $query = "INSERT INTO leraren (Lerarennummer,Voornaam,Achternaam,Email,Mobielnummer,Geboortedatum,Adres,Huisnummer,Postcode,Woonplaats,Geslacht,Rol,slb) VALUES ('$stnummer','$Voornaam','$Achternaam','$email','$telnum','$bday','$adr','$hnum','$postc','$plaats','$gender','$rol','$slb')";
    echo $query;
    $res = mysqli_query($conn, $query);
    $query2 = "INSERT INTO users (Studentnummer,userEmail,userPass) VALUES ('$stnummer', '$email', '$password')";
    $res2 = mysqli_query($conn, $query2);

    if (1 === 1) {
        $leraarnummer = $stnummer;
        $_SESSION['leraar'] = $leraarnummer;
        if ($rol == "2") {
            header("location: registerenleraarvak.php");
            echo "goed";
            echo $_SESSION['leraar'];
        }
        if ($rol == "3") {
            
        }
        if ($rol == "4") {
            
        }
    } else {
        echo "error";
    }

    if ($res) {
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
    } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..";
    }
    if ($res2) {
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
    } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later..";
    }
}

echo $query;
echo "hallo";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Admin</title>

        <!-- Bootstrap core CSS -->
        <link href="../Bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../Bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../Bootstrap/assets/js/ie-emulation-modes-warning.js"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <form action="#" method="post" class="form-horizontal">
            <fieldset>
                <legend> Registreer een nieuwe leraar/Register a new teacher </legend>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="leraarnummer">   Leraarnummer:</label>
                    <div class="col-md-4">
                        <input id="leraarnummer" class="form-control input-md" type="number" name="leraarnummer" maxlength="8" placeholder="Employee ID" value="<?php echo $stnummer; ?>" required="">
                        <span><?php echo $stnummerError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="wachtwoord"> Wachtwoord: </label>
                    <div class="col-md-4">
                        <input type="password" name="pass" placeholder="Enter Password" maxlength="15" class="form-control input-md" required="" />   
                        <span><?php echo $passError, $passError2; ?></span><br><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="wachtwoord2"> Wachtwoord herhalen</label>
                    <div class="col-md-4">
                        <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" class="form-control input-md" required=""/>
                        <br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="voornaam">Voornaam</label>  
                    <div class="col-md-4">
                        <input type="text" name="voornaam" maxlength="30" placeholder="Firstname"  value="<?php echo $Voornaam; ?>" class="form-control input-md" required="">
                        <span><?php echo $fnameError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="achternaam">Achternaam</label>  
                    <div class="col-md-4">
                        <input type="text" name="achternaam" maxlength="60" placeholder="Surname" value="<?php echo $Achternaam; ?>" class="form-control input-md" required="">
                        <span><?php echo $lnameError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Email</label>  
                    <div class="col-md-4">
                        <input type="email" name="Email" maxlength="50" placeholder="Email address" value="<?php echo $email; ?>" class="form-control input-md" required="">
                        <span><?php echo $emailError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Telefoonnumber</label>  
                    <div class="col-md-4">
                        <input type="number" name="Mobielnummer" maxlength="15" placeholder="Phone Number" value="<?php echo $telnum; ?>" class="form-control input-md" required="">
                        <span><?php echo $telError; ?></span><br><br>      
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Geboortedatum/date of birth</label>  
                    <div class="col-md-4">
                        <input type="date" name="Geboortedatum" maxlenth="10" placeholder="Date of birth"  value="<?php echo $bday; ?>" class="form-control input-md" required="">
                        <span><?php echo $bdayError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Straatnaam</label>  
                    <div class="col-md-4">
                        <input type="text" name="adres" maxlength="30" placeholder="Street name"  value="<?php echo $adr; ?>" class="form-control input-md" required="">
                        <span><?php echo $adrError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Huisnummer</label>  
                    <div class="col-md-4">
                        <input type="number" name="Huisnummer" maxlength="5" placeholder="House number" value="<?php echo $hnum; ?>" class="form-control input-md" required="">
                        <span><?php echo $hnumError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Postcode</label>  
                    <div class="col-md-4">
                        <input type="text" name="Postcode" maxlength="6" placeholder="Postal code" value="<?php echo $postc; ?>" class="form-control input-md" required="">
                        <span><?php echo $postcError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">Woonplaats</label>  
                    <div class="col-md-4">
                        <input type="text" name="Woonplaats" maxlength="30" placeholder="City" value="<?php echo $plaats; ?>" class="form-control input-md" required="">
                        <span><?php echo $plaatsError; ?></span><br><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="Geslacht">Geslacht/Gender</label>
                    <div class="col-md-4">
                        <label><input type="radio" name="Geslacht" value="m" checked>Man/Male</label>
                        <label><input type="radio" name="Geslacht" value="f">Vrouw/Female</label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-4 control-label" for="gebruikersrol">Gebruikers rol</label>
                    <div class="col-md-4">
                        <select id="blood_group" name="Role" class="form-control">
                            <option value="2">Docent</option>
                            <option value="3">SLB'er</option>
                            <option value="4">Admin</option>
                        </select>
                        <span><?php echo $rolError; ?></span>
                    </div>
                </div>     


                <div class="form-group">
                    <label class="col-md-4 control-label" for="slb">Selecteer voor SLB'er/Select for SLB</label>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" name="slb" value="yes">SLB'er?</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="signup"></label>
                        <div class="col-md-4">
                            <button type="submit" id="signup" name="submit" class="btn btn-success">Registreer/Register</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="signup"></label>
                        <div class="col-md-4">
                            <a href="adminkeuze.php" class="btn btn-success">Terug naar het keuze menu</a>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </body>
</html>