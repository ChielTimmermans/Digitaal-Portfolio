<?php
ob_start();
session_start();

//if (isset($_SESSION['user']) != "") {
//    header("Location: ..\home.php");
//}elseif ($row ['role'] != 'admin'){
//    header("Location: ..\error.php");
//}
//include_once 'createdatabases/dbconnect.php';
//include 'databaseArray.php';
//        
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
                <button type='submit' name='submit'>get students</button>";

        
            $query2 = "SELECT Voornaam, Achternaam, Studentnummer From gegevens where klas ='$select'";
            
            $result2 = mysqli_query($conn, $query2);
            $column2 = array();
            while ($row2 = mysqli_fetch_array($result2)) {
                $Voornaam = $row2[Voornaam];
                $Achternaam = $row2[Achternaam];
                $studentnummer = $row2[Studentnummer];
                $column2[] = "$Voornaam $Achternaam $studentnummer";
            }
            if (isset($_POST['submit']) or isset($_POST['submit2'])) {
            echo "<select name='leerling[]'>";
            foreach ($column2 as $res2) {
                echo "<option value='$res2'>$res2</option>";
                
            }
             foreach ($_POST['leerling'] as $select2) {
                echo "You have selected :" . $select2; // Displaying Selected Value
                echo "<br>";
            }
            $_SESSION ['leerling'] = $select2;
            
            echo "</select>";
            
            
            echo "<button type='submit' name='submit2'>Give mark</button>";
        }
        echo $_SESSION ['leerling'];
        ?>