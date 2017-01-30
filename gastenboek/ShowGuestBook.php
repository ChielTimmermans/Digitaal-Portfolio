<!DOCTYPE html>
<html>
    <head>
        <title>GuestBookPosts</title>
    </head>
    <body>
        <?php
        require_once '..\CreateDatabases/dbconnect.php';
            $TableName = "visitors"; 
            $SQLstring = "SELECT * FROM $TableName"; 
            $QueryResult = mysqli_query($conn, $SQLstring); 
            if (mysqli_num_rows($QueryResult) == 0) 
            { 
                echo "<p>There are no entries in 
                the guest 
                book!</p>"; 
            } else { 
                echo "<p>The following visitors have signed our "
                . "guest book:</p>"; 
                echo "<table border='1'>"; 
                echo "<tr><th>date</th> "
                . "<th>name</th>"
                . "<th>message</th></tr>"; 
                while($Row = mysqli_fetch_assoc($QueryResult)) 
                { 
                    echo "<tr><td>{$Row['date']}</td>";
                    echo "<td>{$Row['name']}</td>"; 
                    echo "<td>{$Row['message']}</td></tr>"; 
                }
                echo "</table>";
                mysqli_free_result($QueryResult); 
            }  
            mysqli_close($conn); 
                
        ?>
    </body>
</html>