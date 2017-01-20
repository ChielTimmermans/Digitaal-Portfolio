<?php
ob_start();
session_start();
require_once '../loginsystem/dbconnect.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['user'])) {
    header("Location: ../loginsystem/index.php");
    exit;
}
// select loggedin users detail
$res = mysqli_query("SELECT * FROM users WHERE userId=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>portfolio</title>
    </head>
    <body>
        <?php
            
                    $TableName = "s" . $stnummer;
                    
                    $SQLstring = "SELECT * FROM $TableName"; 
                    
                    $QueryResult = mysqli_query($DBConnect, $SQLstring); 
                    if (mysqli_num_rows($QueryResult) == 0) 
                    { 
                        echo "<p>There are no files uploaded!</p>"; 
                    } else { 
                        echo "<table width='100%' border='1'>"; 
                        echo "<tr><th>studentnummer</th> "
                        . "<th>datum</th>"
                        . "<th>vak</th>"
                        . "<th>cijfer</th></tr>";
                        while($Row = mysqli_fetch_assoc($QueryResult)) 
                        { 
                            echo "<tr><td>{$Row['studentnummer']}</td>"; 
                            echo "<td>{$Row['DATE']}</td>";
                            echo "<td>{$Row['vak']}</td>";
                            echo "<td>{$Row['cijfer']}</td></td>";
                        }
                        mysqli_free_result($QueryResult); 
                    }  
                    mysqli_close($DBConnect); 
                
            
        ?>
    </body>
</html>
<?php ob_end_flush(); ?>