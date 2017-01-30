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
                        . "last_name VARCHAR(40) NOT NULL, "
                        . "first_name VARCHAR(40) NOT NULL, "
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
            $LastName = stripslashes($_POST['last_name']);
            $FirstName = stripslashes($_POST['first_name']);
            $Email = stripslashes($_POST['email']);
            $SQLstring2 = "INSERT INTO $TableName VALUES(NULL,"
                    . "'$LastName', '$FirstName', '$Email')";
            $QueryResult2 = mysqli_query($conn, $SQLstring2);
            if($QueryResult2 === FALSE)
            {
                echo "<p>Unable to execute the query.</p>"
                . "<p>Error code " . mysqli_errno($conn)
                . ": " . mysqli_error($conn) . "</p>";
            } else {
                echo "<meta http-equiv='refresh' content='0; url=ShowGuestBook.php' />";
            }
            mysqli_close($conn);
                
            
        ?>
    </body>
</html>