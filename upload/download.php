<?php
//Connect with DB
    $error = "error";
    mysql_connect('localhost', 'root', '') or die($error);
    mysql_select_db('upload');
    
    $DBConnect = mysqli_connect("localhost", "root", ""); 
    $query = "SELECT * FROM upload";
    $QueryResult = mysqli_query($DBConnect, $query);
    $result = mysql_query($query) or die('Error, query failed');
    while($Row = mysqli_fetch_assoc($QueryResult)) 
    {
        $name = $Row['name'];
    } 
    
    if(mysql_num_rows($result)==0){
        echo "Database is empty <br>";
    }
    else{
        while(list($id, $name) = mysql_fetch_array($result)){
            echo "<a href=\"download.php?id=\$id\">$name</a><br>";
        }
    }

    if(isset($_GET['id'])){
        $id    = $_GET['id'];   
        $query = "SELECT name, type, size, content FROM upload WHERE id = '$id'";       
        $result = mysql_query($query) or die('Error, query failed');
        list($name, $type, $size, $content) =  mysql_fetch_row($result);
        header("Content-Disposition: attachment; filename=\"$name\"");
        header("Content-type: $type");
        header("Content-length: $size");
        
    }
    echo file_get_contents($path);
    echo $name;
?>