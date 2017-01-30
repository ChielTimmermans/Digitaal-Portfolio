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
                echo "<tr><th>First Name</th> "
                . "<th>Last Name </th>"
                . "<th>Email</th></tr>"; 
                while($Row = mysqli_fetch_assoc($QueryResult)) 
                { 
                    echo "<tr><td>{$Row['first_name']}</td>"; 
                    echo "<td>{$Row['last_name']}</td>";
                    echo "<td>{$Row['email']}</td></tr>"; 
                } 
                mysqli_free_result($QueryResult); 
            }  
            mysqli_close($conn); 
                
        ?>
    </body>
</html>