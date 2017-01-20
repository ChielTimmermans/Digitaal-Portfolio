<?php

require_once 'common.php';
require_once 'file_util.php';

$dir = "uploads";
$files = get_file_list($dir);

if (count($files) == 0)
{
    echo $lang['Gallerij error'];
}
else
{
    foreach ($files as $fileName)
    {
        $file_url = $dir . "/" . $fileName;
        echo "<a class='afbeeldingen' href='$file_url'>";
        echo "<img src='$file_url' alt='$fileName' />";
        echo "</a>";
    }
}
?>