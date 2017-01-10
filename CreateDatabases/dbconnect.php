<?php
require_once 'Create_Database_Inlog.php';

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	$ipadress = "localhost";
        $ww = "";
	define('DBHOST', $ipadress);
	define('DBUSER', 'root');
	define('DBPASS', $ww);
	define('DBNAME', 'Portfolio');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
	}