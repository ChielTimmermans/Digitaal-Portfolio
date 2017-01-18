<!DOCTYPE html>
<?php
    $allowedExts = array("jpg", "png", "jpeg", "gif", "pdf", "docx", "txt", "xlsx", "xlsm", "xlsb", "pptx", "pptm", "ppt");
    
    
?>
<html>
    <head>
        <title>upload</title>
    </head>
    <body>
        <form action="dbcreate.php" method="post" enctype="multipart/form-data">
            <input id="textareaupload" type="file" name="file" />
            <label for="textareaupload" id="Kies">choose</label>
            <input id="SubmitUpload" type="submit" value="Upload" />
        </form>
    </body>
</html>
    