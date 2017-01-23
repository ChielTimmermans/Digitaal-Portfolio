<?php
ob_start();
session_start();
//if (isset($_SESSION['user']) != "") {
//    header("Location: ..\home.php");
//}elseif ($row ['role'] != 'admin'){
//    header("Location: ..\error.php");
//}



include_once '..\createdatabases/dbconnect.php';

$error = false;

if (isset($_POST['btn-signup']))
{

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
    for ($x = 1; $x < $item; $x++)
    {
        if ($x < 5)
        {
            $projecttitel = "Projecttitel$x";
            $myquery = "SELECT $projecttitel from projecten where studentnummer = 469521";
            $res2 = mysqli_query($conn, $myquery);
            $userRow = mysqli_fetch_array($res2);
            $title = ($userRow[$projecttitel]);
            if ($title == "0")
            {
                $item = $x;
            }
        }
    }

    $x = $x - 1;

    if (!projecttitel5)
    {
        $query = "ALTER TABLE projecten add projecttitel$x VARCHAR(50)";
    }
    if (!$error)
    {
        $item = $x;
        $query = "UPDATE projecten SET projecttitel$item='$titel',Projectcontent$item='$content' WHERE studentnummer = 469521";
        $res = mysqli_query($conn, $query);

        if ($res)
        {
            $errTyp = "success";
            $errMSG = "Successfully registered, you may login now";
            unset($name);
            unset($email);
            unset($pass);
        } else
        {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
        <meta charset="utf-8" />
        <title>Coding Cage - Login & Registration System</title>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <hr />
            <input type="text" name="titel" placeholder="Enter the title of your project"  value="<?php echo $titel1 ?>"/>
            <span><?php echo $nummerError ?></span>
            <br><br>
            <textarea name="content" placeholder="Enter the content of your project"></textarea>

            <br><br>
            <button type="submit" name="btn-signup">enter project</button>
            <span><?php echo $errMSG; ?></span>

            <hr />

        </form>
    </body>
</html>
<?php ob_end_flush(); ?>
