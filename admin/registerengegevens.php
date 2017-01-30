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
 
                
                
                <form class="form-horizontal">
<fieldset>

<legend>Registreer een nieuwe gebruiker/ Register a new user</legend>


<div class="form-group">
  <label class="col-md-4 control-label" for="studentnummer">Studentnummer</label>  
  <div class="col-md-4">
  <input id="studentnummer" class="form-control input-md" type="number" name="studentnummer" maxlength="8" placeholder="Studentnumber" value="<?php echo $stnummer; ?>" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="klas">Klas</label>  
  <div class="col-md-4">
  <input type="text" name="Klas" maxlength="10" placeholder="Class" value="<?php echo $klas; ?>" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="wachtwoord">Wachtwoord</label>
  <div class="col-md-4">
    <input type="password" name="pass" placeholder="Enter Password" maxlength="15" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="wachtwoord2">Herhaal wachtwoord</label>
  <div class="col-md-4">
    <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="voornaam">Voornaam</label>  
  <div class="col-md-4">
  <input type="text" name="voornaam" maxlength="30" placeholder="Firstname"  value="<?php echo $fname; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="achternaam">Achternaam</label>  
  <div class="col-md-4">
  <input type="text" name="achternaam" maxlength="60" placeholder="Surname" value="<?php echo $lname; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input type="email" name="email" maxlength="50" placeholder="Email address" value="<?php echo $email; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Telefoonnumber</label>  
  <div class="col-md-4">
  <input type="number" name="telnummer" maxlength="15" placeholder="Phone Number" value="<?php echo $telnum; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Geboortedatum/date of birth</label>  
  <div class="col-md-4">
  <input type="date" name="geboortedatum" maxlenth="10" placeholder="Date of birth"  value="<?php echo $bday; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Straatnaam</label>  
  <div class="col-md-4">
  <input type="text" name="adres" maxlength="30" placeholder="Street name"  value="<?php echo $adr; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Huisnummer</label>  
  <div class="col-md-4">
  <input type="number" name="huisnummer" maxlength="5" placeholder="House number" value="<?php echo $hnum; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Postcode</label>  
  <div class="col-md-4">
  <input type="text" name="postcode" maxlength="6" placeholder="Postal code" value="<?php echo $postc; ?>" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Postcode</label>  
  <div class="col-md-4">
  <input type="text" name="woonplaats" maxlength="30" placeholder="woonplaats" value="<?php echo $plaats; ?>" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="blood_group">Blood Group</label>
  <div class="col-md-4">
    <select id="blood_group" name="blood_group" class="form-control">
      <option value="-1">Select</option>
      <option value="1">A+</option>
      <option value="2">B+</option>
      <option value="3">AB+</option>
      <option value="4">O+</option>
      <option value="5">A-</option>
      <option value="6">B-</option>
      <option value="7">AB-</option>
      <option value="8">O-</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group alert alert-warning">
  <label class="col-md-4 control-label" for="street">Street</label>  
  <div class="col-md-4">
  <input id="street" name="street" type="text" placeholder="Enter your street" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="area">Area</label>  
  <div class="col-md-4">
  <input id="area" name="area" type="text" placeholder="Enter your area" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="Enter your city" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="dist">District</label>  
  <div class="col-md-4">
  <input id="dist" name="dist" type="text" placeholder="Enter your district" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signup"></label>
  <div class="col-md-4">
    <button id="signup" name="signup" class="btn btn-success">Sign Up</button>
  </div>
</div>

</fieldset>
</form>

            </div> </div>
    </body>
</html>