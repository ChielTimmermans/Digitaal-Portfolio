<?php
session_start();
require_once 'dbconnect.php';

$error = false;

if (isset($_POST['quest-login']))
{
    $gast = trim($_POST['gast']);
    $gast = strip_tags($gast);
    $gast = htmlspecialchars($gast);
    
    if(empty($gast)){
        $error = true;
        $emailError = "please enter your email address.";
    }
    
    if(!$error)
    {
         $query = "SELECT guestmail FROM gast WHERE guestmail='$gast '";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            if ($count != 0)
            {
                $error = true;
                $emailError = "Provided Email is already in use.";
            }else{
                $_SESSION['user'] = $gast;
                header("Location: ..\gast.php");
            }
            
    }
}