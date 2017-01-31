<?php

session_start();
if (!isset($_SESSION['user']))
{
    echo "geen user";
    header("Location: index.php");
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
    }elseif ($_SESSION['Rol'] == 3){
        header("Location: backend\slber\home.php");
        echo"leraar";
        exit;
    }elseif ($_SESSION['Rol'] == 4){
        echo "admin";
        header("Location: ..\admin\adminkeuze.php");
        exit;
    }else{
        echo "rol session not set";
        echo ($_SESSION['Rol']);
        unset($_SESSION['user']);
        unset($_SESSION['Rol']);
        session_unset();
        session_destroy();
        //header("Location: index.php");
        exit;
    }
    
    }
    
    session_start();
if (($_SESSION['Rol']) != "4"){
    header("Location: ..\index.php");
}