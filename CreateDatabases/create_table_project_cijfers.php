<?php
        $DBConnect = mysqli_connect('localhost', 'root', '');
        $DBName = 'portfolio';
        mysqli_select_db($DBConnect, $DBName);
        $TableName = "projectcijfer";
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0)
        {
            $SQLstring = "CREATE TABLE $TableName(
            studentnummer                   INT(10)         UNIQUE KEY,
            cijfer1                        VARCHAR(4),
            comment1                        VARCHAR(1000),
            cijfer2                        VARCHAR(4),
            comment2                        VARCHAR(1000),
            cijfer3                       VARCHAR(4),
            comment3                        VARCHAR(1000),
            cijfer4                        VARCHAR(4),
            comment4                        VARCHAR(1000))";
            echo $SQLstring;
            $QueryResult = mysqli_query($DBConnect, $SQLstring);
            if ($QueryResult === FALSE)
            {
                echo "<p>Unable to create the table.</p>"
                . "<p>Error code "
                . mysqli_errno($DBConnect)
                . ": " . mysqli_error($DBConnect) . "</p>";
            }
        }

