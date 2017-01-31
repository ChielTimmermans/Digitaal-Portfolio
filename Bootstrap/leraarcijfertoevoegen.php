<?php
ob_start();
session_start();

if (($_SESSION['Rol']) != "1"){
    header("Location: index.php");
}

include_once '..\createdatabases/dbconnect.php';
include '..\databaseArray.php';
$error = false;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <?php
        echo "  <form method='post' action='#' autocomplete='off'>
                <select name='klas[]'>";
        $query = "SELECT Klas FROM klas";
        $result = mysqli_query($conn, $query);

        $column = array();
        while ($row = mysqli_fetch_array($result)) {
            $column[] = $row[Klas];
        }
        foreach ($column as $res) {
            echo "<option value='$res'>$res</option>";
        }
        if (isset($_POST['submit'])) {
            // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
            foreach ($_POST['klas'] as $select) {
                echo "You have selected :" . $select; // Displaying Selected Value
            }
        }
        echo "  </select>
                <button type='submit' name='submit'>get students</button><br>";

        if (isset($_POST['submit'])) {
            $query2 = "SELECT Voornaam, Achternaam, Studentnummer From gegevens where klas ='$select'";
            echo "<select name='leerling[]'>";
            $result2 = mysqli_query($conn, $query2);
            $column2 = array();
            while ($row2 = mysqli_fetch_array($result2)) {
                $Voornaam = $row2[Voornaam];
                $Achternaam = $row2[Achternaam];
                $studentnummer = $row2[Studentnummer];
                $column2[] = "$Voornaam $Achternaam $studentnummer";
            }
            foreach ($column2 as $res2) {
                echo "<option value='$res2'>$res2</option>";
            }
            echo "</select>";
            echo "<button type='submit' name='submit2'>Give mark</button>";
        }
        if (isset($_POST['submit2'])) {
            // As output of $_POST['Color'] is an array we have to use foreach Loop to display individual value
            foreach ($_POST['leerling'] as $select2) {
                echo "You have selected :" . $select2; // Displaying Selected Value
                echo "<br>";
            }
            $_SESSION ['leerling'] = $select2;
            echo"<input type='text' name='cijfer' placeholder='set mark'/>";

            $query4 = "select Vak, Vak2, Vak3 from leraren where Lerarennummer='123456'";
            $result4 = mysqli_query($conn, $query4);
            $row = mysqli_fetch_array($result4, MYSQLI_ASSOC);

            echo "<select name='Vak[]'>";
            foreach ($row as $res4) {
                echo "<option value='$res4'>$res4</option>";
            }
            echo "</select>";
            echo"<button type='submit' name='submit3'>Sent mark</button>";
            
            }
        if (isset($_POST['submit3'])) 
            {
            foreach ($_POST['Vak'] as $select3) 
                {
                echo "You have selected :" . $select3; // Displaying Selected Value
                echo "<br>";
                }
            }        
        $leerling = $_SESSION ['leerling'];
        $leerling = substr($leerling, -6);
        $vak = $select3;
        echo $vak;
        $cijfer = ($_POST['cijfer']);
        $query3 = "Update cijfer set $vak='$cijfer' where studentnummer='$leerling'";
        echo $query3;
        $res = mysqli_query($conn, $query3);


        echo"</form>";
        ?>
    </body>
</html>
        <?php ob_end_flush(); ?>