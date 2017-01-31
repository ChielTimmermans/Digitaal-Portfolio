<?php
ob_start();
session_start();
//if (isset($_SESSION['user']) != "") {
//    header("Location: ..\home.php");
//}elseif ($row ['role'] != 'admin'){
//    header("Location: ..\error.php");
//}
if (($_SESSION['Rol']) != "1") {
    header("Location: index.php");
}


include_once '..\createdatabases/dbconnect.php';

$error = false;

if (isset($_POST['btn-signup'])) {

    $studentnummer = 469521;
//    $studentnummer = trim($_POST['studentnummer']);
    $studentnummer = strip_tags($studentnummer);
    $studentnummer = htmlspecialchars($studentnummer);

    $titel = trim($_POST['titel']);
    $titel = strip_tags($titel);
    $titel = htmlspecialchars($titel);

    $content = trim($_POST['content']);
    $content = strip_tags($content);
    $content = htmlspecialchars($content);

    $item = 6;
    for ($x = 1; $x < $item; $x++) {
        if ($x < 5) {
            $projecttitel = "Projecttitel$x";
            $myquery = "SELECT $projecttitel from projecten where studentnummer = 469521";
            $res2 = mysqli_query($conn, $myquery);
            $userRow = mysqli_fetch_array($res2);
            $title = ($userRow[$projecttitel]);
            if ($title == "0") {
                $item = $x;
            }
        }
    }

    $x = $x - 1;

    if (!projecttitel5) {
        $query = "ALTER TABLE projecten add projecttitel$x VARCHAR(50)";
    }
    if (!$error) {
        $item = $x;
        $query = "UPDATE projecten SET projecttitel$item='$titel',Projectcontent$item='$content' WHERE studentnummer = $user";
        $res = mysqli_query($conn, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }
        $filename = stripslashes($_FILES['project']['name']);
        echo $filename;
        $expl = explode('.', $filename);
        $file_basename = $expl[0]; // give new name
        $file_ext = $expl[1]; // get file extention
        $filesize = stripslashes($_FILES['project']['size']);
        $allowed_file_types = array('gif', 'jpg', 'pjpg', 'png', 'pdf', 'docx', 'doc', 'xlsx', 'pptx', 'potx', 'ppsx', 'sldx');
        $target_dir = "projecten/";
        $target_file = $target_dir . $filename;

        if (in_array($file_ext, $allowed_file_types) && ($filesize < 2000000000)) {
            if (file_exists($target_file)) {
                echo 'this file already exists';
            }
            if (!unlink($target_file)) {
                echo 'bestand vervangen niet gelukt';
            } else {
                echo 'bestand vervangen';
            }
        } else {
            move_uploaded_file($_FILES['project']['tmp_name'], $target_file);
            if (!move_uploaded_file($_FILES['project']['tmp_name'], $target_file)) {
                echo "There was an error uploading the file, please try again!";
                echo $target_file;
            } else {
                $query2 = "UPDATE projectbestanden SET projecttitel$item='$titel',Projectcontent$item='$target_file' WHERE studentnummer = $user";
                $res2 = mysqli_query($conn, $query2);
                echo "File uploaded successfully.";
            }
        }
    } elseif ($filesize > 2000000000) {
        echo "The file you are trying to upload is too large.";
    } else {
        echo "Only these file typs are allowed for upload: " . implode(', ', $allowed_file_types);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
        <meta charset="utf-8" />
        <title>Add project</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <hr />
            <input type="text" name="titel" placeholder="Enter the title of your project"  value="<?php echo $titel1 ?>"/>
            <span><?php echo $nummerError ?></span>
            <br><br>
            <textarea name="content" placeholder="Enter the content of your project"></textarea>
            <br><br>
            <input type="file" name="project"><br><br>
            <button type="submit" name="btn-signup">enter project</button>
            <span><?php echo $errMSG; ?></span>

            <hr />

        </form>
    </body>
</html>
<?php ob_end_flush(); ?>
