<?php
$pass = "1939/01/01";
$password = hash('sha256', $pass);
echo $password;