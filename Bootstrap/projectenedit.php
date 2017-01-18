<?php
ob_start();
session_start();
//if (isset($_SESSION['user']) != "") {
//    header("Location: ..\home.php");
//}elseif ($row ['role'] != 'admin'){
//    header("Location: ..\error.php");
//}



include_once '..\createdatabases/dbconnect.php';

$error = false;

if (isset($_POST['btn-signup']))
{

    $studentnummer = trim($_POST['studentnummer']);
    $studentnummer = strip_tags($studentnummer);
    $studentnummer = htmlspecialchars($studentnummer);

    $titel1 = trim($_POST['titel1']);
    $titel1 = strip_tags($titel1);
    $titel1 = htmlspecialchars($titel1);

    $content1 = trim($_POST['content1']);
    $content1 = strip_tags($content1);
    $content1 = htmlspecialchars($content1);

    $titel2 = trim($_POST['titel2']);
    $titel2 = strip_tags($titel2);
    $titel2 = htmlspecialchars($titel2);

    $content2 = trim($_POST['content2']);
    $content2 = strip_tags($content2);
    $content2 = htmlspecialchars($content2);
    
    $titel3 = trim($_POST['titel3']);
    $titel3 = strip_tags($titel3);
    $titel3 = htmlspecialchars($titel3);

    $content3 = trim($_POST['content3']);
    $content3 = strip_tags($content3);
    $content3 = htmlspecialchars($content3);

    $titel4 = trim($_POST['titel4']);
    $titel4 = strip_tags($titel4);
    $titel4 = htmlspecialchars($titel4);

    $content4 = trim($_POST['content4']);
    $content4 = strip_tags($content4);
    $content4 = htmlspecialchars($content4);
    //basic email validation
        
        $query = "SELECT studentnummer FROM users WHERE studentnummer='$studentnummer'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count != 0)
        {
            $error = true;
            $nummerError = "Provided studentnummer is already in use.";
        }elseif (strlen($studentnummer) < 6 ){
            $error = true;
            $nummerError = "Provided studentnummer is to short";
        }elseif (strlen($studentnummer) > 6 ){
            $error = true;
            $nummerError = "provided studentnumber is to long";
        }elseif ($studentnummer < 0){
            $error = true;
            $nummerError = "provided Studentnumber is negative";
        }

       
        // if there's no error, continue to signup
        if (!$error)
        {

            $query = "INSERT INTO projecten(Studentnummer,Projecttitel1,Projectcontent1,Projecttitel2,Projectcontent2,Projecttitel3,Projectcontent3,Projecttitel4,Projectcontent4) VALUES('$studentnummer','$email','$password')";
            $res = mysqli_query($conn, $query);

            if ($res)
            {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                unset($name);
                unset($email);
                unset($pass);
            } else
            {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";
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
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <p>user registeren</p>
                <hr />
                <input type="number" name="studentnummer" placeholder="Enter your studentnumber" maxlength="8" value="<?php echo $studentnummer ?>"/>
                <span><?php echo $nummerError?></span>
                <br><br>
                <input type="email" name="email" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span><?php echo $emailError; ?></span>
                <br><br>
                <input type="password" name="pass" placeholder="Enter Password" maxlength="15" />   
                <span><?php echo $passError, $passError2; ?></span>
                <br><br>
                <input type="password" name="pass2" placeholder="Enter Password again" maxlength="15" />   
                
                <br><br>
                <button type="submit" name="btn-signup">Sign Up</button>
                <span><?php echo $errMSG; ?></span>

                <hr />

            </form>
        </body>
    </html>
    <?php ob_end_flush(); ?>
