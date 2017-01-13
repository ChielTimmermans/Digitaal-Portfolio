<!DOCTYPE html>
<html>
    <head>
        <title>chat</title>
    </head>
    <body>
        <?php
            $DBConnect = mysqli_connect("localhost", "root", 
            ""); 
            if ($DBConnect === FALSE) 
            { 
                echo "<p>Unable to connect to the database 
                server.</p>" 
                . "<p>Error code " . mysqli_errno() 
                . ": " . mysqli_error() 
                . "</p>"; 
            } else { 
                $DBName = "Chat"; 
                if(!mysqli_select_db($DBConnect, $DBName)) 
                { 
                    echo "<p>There are no survey filled in!</p>"; 
                }else { 
                    $TableName = "bericht"; 
                    $SQLstring = "SELECT * FROM $TableName"; 
                    $QueryResult = mysqli_query($DBConnect, $SQLstring); 
                    if (mysqli_num_rows($QueryResult) == 0) 
                    { 
                        echo "<p>There are no survey filled in!</p>"; 
                    } else { 
                        echo "<p>The filled in surveys</p>"; 
                        echo "<table width='100%' border='1'>"; 
                        echo "<tr><th>message_date</th> "
                        . "<th>name</th>"
                        . "<th>message</th>";
                        while($Row = mysqli_fetch_assoc($QueryResult)) 
                        { 
                            if ($Row['public_message'] == 'Y'){
                                echo "<tr><td>{$Row['message_date']}</td>";
                                echo "<td>{$Row['name']}</td>";
                                echo "<td>{$Row['message']}</td>"; 
                            }
                        } 
                        mysqli_free_result($QueryResult); 
                    }  
                    mysqli_close($DBConnect); 
                } 
            }
        ?>
        <p><a href="chat.php">back</a></p>
    </body>
</html>