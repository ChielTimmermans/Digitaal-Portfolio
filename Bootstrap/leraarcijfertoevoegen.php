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
            $query2 = "SELECT Voornaam, Achternaam, Studentnummer From gegevens where klas = '$select'";
            $result2 = mysqli_query($conn, $query2);
            
            $column2[] = array();
            while ($row2 = mysqli_fetch_array($result2)) {
                $Voornaam = $row2[Voornaam];
                $Achternaam = $row2[Achternaam];
                $Studentnummer = $row2[Studentnummer];
                $column2[$a] = "$Voornaam $Achternaam $Studentnummer";
                $a++;
            }
            foreach ($column2 as $res2) {
                echo "<option value='$res2'>$res2</option>";
            }
            echo "</select>";
            echo "<input type='submit' name='submitstudent' value='Get students'/>
            </form>";
            }
            echo $klas;
            
            
            echo "<form method='post' action='#'>";
            
            
            if (isset($_POST['submitstudent'])) {
                // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
                foreach ($_POST['leerling'] as $select2) {
                    $select2;
                }
            echo "<form method='post' action='#'>
                <input type='text' name='cijfer' placeholder='vul cijfer in'>
                <button type='submit' name='submit'>verzend cijfer</button>
                </form>";
                
                
                }
            echo $select2;
            $studentnummer = substr($select2, -6);
            $_SESSION['studentnummer'] = $studentnummer;
            echo $_SESSION['studentnummer'];
            echo $newstring;
            $cijfer = $_POST['cijfer'];
            $vak = "Computernetwerken_1";
            $Studentnummer = $_SESSION['studentnummer'];
            $query2 = "UPDATE cijfer SET $vak='$cijfer' WHERE studentnummer = $Studentnummer";
            echo $query2;
            $res2 = mysqli_query($conn, $query2);
            
        ?>
            
        <p>hallo <?php echo $select2; ?></p>
    </body>
</html>
<?php ob_end_flush(); ?>