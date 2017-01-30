<!DOCTYPE html>
<html>
    <head>
        <title>SignGuestBook</title>
    </head>
    <body>
        <?php
        require_once '..\CreateDatabases/dbconnect.php';
            $TableName = "visitors";
            $SQLstring = "SHOW TABLES LIKE '$TableName'";
            $QueryResult = mysqli_query($conn, $SQLstring);

            if(mysqli_num_rows($QueryResult) == 0)
            {
                $SQLstring = "CREATE TABLE $TableName (countID "
                        . "INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY, "
                        . "name VARCHAR(40) NOT NULL, "
                        . "message VARCHAR(250) NOT NULL, "
                        . "date VARCHAR(25) NOT NULL, "
                        . "email VARCHAR(50) NOT NULL)";
                $QueryResult = mysqli_query($conn,
                                $SQLstring);
                if($QueryResult === FALSE)
                {
                    echo "<p>Unable to create the table.</p>"
                    . "<p>Error code "
                    . mysqli_errno($conn)
                    . ": " . mysqli_error($conn) . "</p>";
                }
            }
            $date = "NOW()";
            $name = stripslashes($_POST['name']);
            $bericht = stripslashes($_POST['bericht']);
            $Email = stripslashes($_POST['email']);
            $SQLstring2 = "INSERT INTO $TableName VALUES(NULL,"
                    . "'$name', '$bericht', $date, '$Email')";
            $QueryResult2 = mysqli_query($conn, $SQLstring2);
            if($QueryResult2 === FALSE)
            {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code " . mysqli_errno($conn)
                . ": " . mysqli_error($conn) . "</p>";
            } else {
               echo "<meta http-equiv='refresh' content='0; url=berichten.php' />";
            }
            mysqli_close($conn);
                
            
        ?>
    </body>
</html>