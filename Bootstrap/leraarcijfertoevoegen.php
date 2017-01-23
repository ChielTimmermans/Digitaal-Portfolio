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

if (isset($_POST['btn-signup'])) {
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form method="post" action="#">
            <select name="klas[]" >
                <?php
                include '..\databaseArray.php';

                $query = "SELECT Klas FROM klas";
                $result = mysqli_query($conn, $query);

                //Column 'Klas' omgezet naar een array.
                $column = array();
                while ($row = mysqli_fetch_array($result)) {
                    $column[] = $row[Klas];
                }
                foreach ($column as $res) {

                    echo "<option value='$res'>$res</option>";
                }
                ?>
            </select>
            <input type='submit' name='submitklas' value="Get students"/>
        </form>
        <form method="post" action="#">

            <?php
            if (isset($_POST['submitklas'])) {
                // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
                foreach ($_POST['klas'] as $select) {
                    $select;
                }
            }
            if (isset($_POST['submitklas'])){
            $a = 0;
            
            echo "<select name='leerling[]'>";
            $query2 = "SELECT Voornaam, Achternaam From gegevens where klas = '$select'";
            $result2 = mysqli_query($conn, $query2);
            
            $column2[] = array();
            while ($row2 = mysqli_fetch_array($result2)) {
                $voornaam = $row2[Voornaam];
                $achternaam = $row2[Achternaam];
                $column2[$a] = "$voornaam $achternaam";
                $a++;
            }
            foreach ($column2 as $res2) {
                echo "<option value='$res2'>$res2</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='submitstudent' value='Get students'/>";
            }
            echo $klas;
            ?> 
            
            </form>
        <?php
            if (isset($_POST['submitstudent'])) {
                // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
                foreach ($_POST['leerling'] as $select2) {
                    $select2;
                }
            }
            $query = "SELECT Studentnummer FROM gegevens Where Voornaam = ";
            
                    
            $query2 = "select vakNaam, cijfer From '$cijfer'";
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        ?>
        <p>hallo <?php echo $select2; ?></p>
    </body>
</html>
<?php ob_end_flush(); ?>