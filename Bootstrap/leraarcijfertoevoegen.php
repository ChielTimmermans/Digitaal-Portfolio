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
            <select name="klas">
                <?php
                include '..\databaseArray.php';

                $query = "SELECT Klas FROM klas";
                $result = mysqli_query($conn, $query);

                //Column 'Klas' omgezet naar een array.
                $column = array();
                while ($row = mysqli_fetch_array($result))
                {
                    $column[] = $row[Klas];
                }
                foreach($column as $res){

                    echo "<option value='$res'>$res</option>";
                }
                ?>
            </select>
            <button type='submit' name='submit'>get students</button>
            
                <?php
                if (isset($_POST['submit'])){ 
                echo "<select name='leerling'>";
                $query ="SELECT Voornaam, Achternaam From gegevens where klas =$res";
                                $result = mysqli_query($conn, $query);

                //Column 'Klas' omgezet naar een array.
                $column = array();
                while ($row = mysqli_fetch_array($result))
                {
                    $column[] = $row[Klas];
                }
                foreach($column as $res){
                    echo $res;
                    echo "<option value='$res'>$res</option>";
                }
                echo "</select>";
                echo "bier";
                }
                
                ?>            
        </form>
    </body>
</html>
<?php ob_end_flush(); ?>