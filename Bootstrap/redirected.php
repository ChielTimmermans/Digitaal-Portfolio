<?php

session_start();
if (!isset($_SESSION['user']))
{
    echo "geen user";
//header("Location: index.php");
    exit;
}else{
    if ($_SESSION['Rol'] == 1){
        header("Location: Portfolio.php");
        echo "portfolio";
        exit;
    }elseif ($_SESSION['Rol'] == 2){
        header("Location: backend\docent\home.php");
        echo"leraar";
        exit;
    }elseif ($_SESSION['Rol'] === 3){
        echo "admin";
        header("Location: Admin.php");
        exit;
    }else{
        echo "rol session not set";
        unset($_SESSION['user']);
        unset($_SESSION['Rol']);
        session_unset();
        session_destroy();
        //header("Location: index.php");
        exit;
    }
    
    }