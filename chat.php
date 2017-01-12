<!DOCTYPE html>
<html>
    <head>
        <title>chat</title>
    </head>
    <body>
        <?php
            if(empty($_POST['name']) || empty($_POST['message']))
            {
                echo "<p>Fill in all fields</p>";
            } else {
                $DBConnect = mysqli_connect("localhost", "root", "");
                if ($DBConnect === FALSE)
                {
                    echo "<p>Unable to cennect to the database server.</p>"
                    . "<p>Error code " . msqli_errno() . ": "
                    . mysqli_error() . "</p>";
                } else {
                    $DBName = "chat";
                    if(!mysqli_select_db ($DBConnect, $DBName))
                    {
                        $SQLstring = "CREATE DATABASE $DBName";
                        $QueryResult = mysqli_query($DBConnect,
                                        $SQLstring);
                        if ($QueryResult === FALSE)
                        {
                            echo "<p>Unable to execute the query.</p>"
                            .   "<p>Error code "
                            .   mysqli_errno($DBConnect)
                            .   ": " . mysqlierror($DBConnect) . "</p>";
                        }else {
                            echo "<p>You are the first visitor!</p>";
                        }
                    }
                    mysqli_select_db($DBConnect, $DBName);
                    $TableName = "bericht";
                    $SQLstring = "SHOW TABLES LIKE '$TableName'";
                    $QueryResult = mysqli_query($DBConnect, $SQLstring);
                    
                    if(mysqli_num_rows($QueryResult) == 0)
                    {
                        $SQLstring = "CREATE TABLE $TableName (countID"
                                . "SMALL INT AUTO_INCREMENT PRIMARY KEY, "
                                . "message_date DATE, "
                                . "message_time TIME, "
                                . "name VARCHAR(40),"
                                . "message VARCHAR(250),"
                                . "public_message ENUM('Y', 'N')"
                                . ")";
                        $QueryResult = mysqli_query($DBConnect,
                                        $SQLstring);
                        if($QueryResult === FALSE)
                        {
                            echo "<p>Unable to create the table.</p>"
                            . "<p>Error code "
                            . mysqli_errno($DBConnect)
                            . ": " . mysqli_error($DBConnect) . "</p>";
                        }
                    }
                    $name = stripslashes($_POST['name']);
                    $message = stripslashes($_POST['message']);
                    $date = date("ymd");
                    $time = date("his");
                    $public_message = 'n';
                    if(isset($_POST['public'])){
                        if ($_POST['public'] == 'yes'){
                            $public_message = 'y';
                        }
                    }
                    $SQLstring2 = "INSERT INTO $TableName VALUES(NULL, $date, $time, "
                            . "'$name', '$message', '$public_message')";
                    $QueryResult2 = mysqli_query($DBConnect, $SQLstring2);
                    if($QueryResult2 === FALSE)
                    {
                        echo "<p>Unable to execute the query.</p>"
                        . "<p>Error code " . mysqli_errno($DBConnect)
                        . ": " . mysqli_error($DBConnect) . "</p>";
                    } else {
                        echo "<h1>Thank you!</h1>";
                    }
                    mysqli_close($DBConnect);
                }
            }
        ?>
        <form method="POST" action="chat.php"> 
            <p>Name <input type="text" name="name"/></p> 
            <p>Message <input type="text" name="message"/></p>
            <p>public <input type="checkbox" name="public" value="yes"/></p>
            <p><input type="submit" value="Submit" /></p> 
        </form>
    </body>
</html>