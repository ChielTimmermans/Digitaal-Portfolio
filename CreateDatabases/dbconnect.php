<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	$ipadress = "localhost";
        $ww = "";
	define('DBHOST', $ipadress);
	define('DBUSER', 'root');
	define('DBPASS', $ww);
	define('DBNAME', 'Portfolio');
	
	$conn = mysqli_connect($ipadress,'root',$ww);
	$dbcon = mysqli_select_db($conn, 'Portfolio');
	
	if ( !$conn ) {
		die("Connection failed : " . mysqli_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysqli_error());
	}