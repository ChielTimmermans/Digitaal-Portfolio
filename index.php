<!DOCTYPE html>
<?php
include_once 'functions/common.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['Title']; ?></title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="container">
            <div id="headerInclude">
                <?php include 'headerInclude.php'; ?>   
            </div>         
            <h1><?php echo $lang['SubTitle']; ?></h1>
            <p> pils</p>
            <div id = "nederlands">
                <a href = "?lang=nl">Nederlands</a>
            </div>
            <div id = "engels">
                <a href = "?lang=en" >Engels</a>
            </div>
        </div>
    </body>
</html>



