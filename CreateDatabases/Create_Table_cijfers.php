<?php
        $DBConnect = mysqli_connect('localhost', 'root', '');
        $DBName = 'portfolio';
        mysqli_select_db($DBConnect, $DBName);
        $TableName = "cijfer";
        $SQLstring = "SHOW TABLES LIKE '$TableName'";
        $QueryResult = mysqli_query($DBConnect, $SQLstring);
        if (mysqli_num_rows($QueryResult) == 0)
        {
            $SQLstring = "CREATE TABLE $TableName(
            studentnummer                   INT(10)         UNIQUE KEY,
            Informatiemanagement            VARCHAR(4),
            PHP                             VARCHAR(4),
            HTML_en_CSS                     VARCHAR(4),
            Digital_Graphic_Design_1        VARCHAR(4),
            Project_Professionele_Website   VARCHAR(4),
            Mondelinge_communicatie_1       VARCHAR(4),
            Databases_1                     VARCHAR(4),
            Unleash_your_Potential_in_PHP   VARCHAR(4),
            Studieloopbaanbegeleiding_1A    VARCHAR(4),
            Project_Digitale_Portfolio      VARCHAR(4),
            Schriftelijke_Communicatie      VARCHAR(4),
            Java_1                          VARCHAR(4),
            Computernetwerken_1             VARCHAR(4),
            Inleiding_Wiskunde              VARCHAR(4),
            Project_Solar_Bot               VARCHAR(4),
            Studieloopbaanbegeleiding_1B    VARCHAR(4),
            Csharp_1                        VARCHAR(4),
            Multimedia_Productie            VARCHAR(4),
            Project_Stenden_Creative_Realization VARCHAR(4))";
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
