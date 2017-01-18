<!DOCTYPE html>
<html>
    <head>
        <title>Upload</title>
    </head>
    <body>
        <form action="viewupload.php" method="post">
            <select name="select">
                <option value="date ASC">New - Old</option>
                <option value="date DESC">Old - New</option>
                <option value="name ASC">A - Z</option>
                <option value="name DESC">Z - A</option>
                <option value="type ASC">file type</option>
                <option value="size ASC">big - small</option>
                <option value="size DESC">small - big</option>
            </select>
            <input name="filter" type="submit" value="filter" />
        </form>
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
                $DBName = "upload"; 
                if(!mysqli_select_db($DBConnect, $DBName)) 
                { 
                    echo "<p>There are no files uploaded!</p>"; 
                }else { 
                    $TableName = "upload";
                    if (isset($_POST['filter']))
                    {
                        $select = $_POST['select'];
                        $SQLstring = "SELECT * FROM $TableName ORDER BY $select";
                    } else {
                    $SQLstring = "SELECT * FROM $TableName"; 
                    }
                    $QueryResult = mysqli_query($DBConnect, $SQLstring); 
                    if (mysqli_num_rows($QueryResult) == 0) 
                    { 
                        echo "<p>There are no files uploaded!</p>"; 
                    } else { 
                        echo "<p>uploaded files</p>"; 
                        echo "<table width='100%' border='1'>"; 
                        echo "<tr><th>date</th> "
                        . "<th>user</th>"
                        . "<th>name</th>"
                        . "<th>type</th>"
                        . "<th>size</th>"
                        . "<th>download</th></tr>";
                        while($Row = mysqli_fetch_assoc($QueryResult)) 
                        { 
                            echo "<tr><td>{$Row['date']}</td>"; 
                            echo "<td>{$Row['user']}</td>";
                            echo "<td>{$Row['name']}</td>";
                            echo "<td>{$Row['type']}</td>";
                            echo "<td>{$Row['size']}</td>";
                            echo "<td><a href='{$Row['content']}'>download</a></td>";
                        }
                        mysqli_free_result($QueryResult); 
                    }  
                    mysqli_close($DBConnect); 
                } 
            }
        ?>
        <p><a href="opnieuw.php">back</a></p>
    </body>
</html>