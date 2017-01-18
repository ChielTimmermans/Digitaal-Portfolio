<?php













$user = 123456;

















/*

session_start();
require_once '..\createDatabases/dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT * FROM users WHERE studentnummer = '$user'";
$result = mysqli_query($conn, $query)
  or die("Error: ".mysqli_error($conn));
$row =  mysqli_fetch_array($result,MYSQLI_ASSOC);
 
 
 */



// Extensies die zijn toegestaan
                  if($_FILES['file']['name'] == "") {
                      echo "Select a file";
                  }else{
                            $allowedExts = array("jpg", "png", "jpeg", "gif", "bmp", "docx", "pdf", "txt", "xlsx", "xlsm", "xlsb", "pptx", "pptm", "ppt");

                            // Map waar de afbeeldingen geüpload worden
                            $dir = $user . "uploads";

                            // Check of er een bestand verstuurd is
                            if (isset($_FILES['file']['name'])) {

                                // Verkrijg de extensie van het bestand
                                $expl = explode(".", $_FILES['file']['name']);
                                $extension = end($expl);

                                // Check of de bestandstype is toegestaan
                                if (in_array($extension, $allowedExts)) {

                                    // Maakt de map aan als die niet bestaad
                                    if (!file_exists($dir)) {
                                        mkdir($dir, 0777);
                                    }
                                    // Voegt een random nummer toe voor het bestand zodat hij uniek is.
                                    $fileName = rand(10000000, 99999999) . "_" . $_FILES['file']['name'];
                                    $fullFilePath = $dir . "/" . $fileName;

                                    // Verplaatst het bestand naar de juiste locatie
                                    move_uploaded_file($_FILES['file']['tmp_name'], $fullFilePath);

                                    // Response
                                    
                                } else {
                                    // Geeft fout terug
                                    
                                }
                            }





$DBConnect = mysqli_connect("127.0.0.1", "root", "");
            if ($DBConnect === FALSE)
            {
                echo "<p>Unable to connect to the database server.</p>"
                . "<p>Error code " . mysqli_errno() . ": "
                . mysqli_error() . "</p>";
            } else {
                $DBName = "upload";
                if(!mysqli_select_db ($DBConnect, $DBName))
                {
                    $SQLstring = "CREATE DATABASE $DBName";
                    $QueryResult = mysqli_query($DBConnect,
                    $SQLstring);
                    if ($QueryResult === FALSE)
                    {
                        echo "<p>Unable to execute the query.</p>"
                        . "<p>Error code "
                        . mysqli_errno($DBConnect)
                        . ": " . mysqli_error($DBConnect) . "</p>";
                    }
                }
            mysqli_select_db($DBConnect, $DBName);
            $TableName = "UPLOAD";
            $SQLstring = "SHOW TABLES LIKE '$TableName'";
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if(mysqli_num_rows($QueryResult) == 0)
            {
                $SQLstring = "CREATE TABLE $TableName(ID
                 SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 date VARCHAR(19) NOT NULL,
                 user INT(6) NOT NULL,
                 name VARCHAR(30) NOT NULL,
                 type VARCHAR(4) NOT NULL,
                 size INT(11) NOT NULL,
                 content VARCHAR(100) NOT NULL)";
                
                $QueryResult = mysqli_query($DBConnect,
                 $SQLstring);
                if($QueryResult === FALSE)
                {
                    echo "<p>Unable to create the table.</p>"
                    . "<p>Error code "
                    . mysqli_errno($DBConnect)
                    . ": " . mysqli_error($DBConnect) . "</p>";
                }
            }
            $date = "NOW()";
            //$date = date("ymdhis");
            $nameFile = stripslashes($_FILES['file']['name']);
            $typeFile = explode(".", $nameFile);
            echo "<pre>";
            print_r ($typeFile);
            echo "</pre>";
            end($typeFile);
            $key = key($typeFile);
            var_dump($key);
            $sliced = array_slice($typeFile, 0, -1);
            $nameFile = implode(".", $sliced);
            echo $nameFile;
            echo "<br/>";
            //$typeFile = stripslashes($_FILES['file']['type']);
            $sizeFile = stripslashes($_FILES['file']['size']);
            $tmpName  = $_FILES['file']['tmp_name'];
            $contentFile = $fullFilePath;
            echo $fullFilePath;
            $SQLstring2 = "INSERT INTO $TableName VALUES(NULL, $date, $user,
            '$nameFile', '$typeFile[$key]', '$sizeFile', '$contentFile')";
            $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
            echo $SQLstring2;
            if($QueryResult2 === FALSE)
            {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code " . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
            } else {
                echo "Gelukt.";
            }
                mysqli_close($DBConnect);
        }
    } 
        
        
        
        
?>

