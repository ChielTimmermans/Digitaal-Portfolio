<form class="formulier" action="upload.php" method="post" enctype="multipart/form-data">
    <div>
        <?php
        ob_start();
        session_start();
        require_once 'createDatabases\dbconnect.php';

        // if session is not set this will redirect to login page
        if (!isset($_SESSION['user']))
        {
            header("Location: index.php");
            exit;
        }
        // select loggedin users detail
        $user = ($_SESSION['user']);
        $res = mysqli_query("SELECT * FROM users WHERE Studentnummer= $user");
        $userRow = mysqli_fetch_array($res);


        include 'functions/common.php';
        // Extensies die zijn toegestaan
        $allowedExts = array("jpg", "png", "jpeg", "gif", "bmp", "docx", "xlsx", "txt", "pdf", "zip", "pptx", "mpp");

        // Map waar de afbeeldingen ge�pload worden
        $dir = "uploads";

        // Check of er een bestand verstuurd is
        if (isset($_FILES['file']['name']))
        {

            // Verkrijg de extensie van het bestand
            $expl = explode(".", $_FILES['file']['name']);
            $extension = end($expl);

            // Check of de bestandstype is toegestaan
            if (in_array($extension, $allowedExts))
            {

                // Maakt de map aan als die niet bestaad
                if (!file_exists($dir))
                {
                    mkdir($dir, 0777);
                }
                // Voegt een random nummer toe voor het bestand zodat hij uniek is.
                $fileName = rand(10000000, 99999999) . "_" . $_FILES['file']['name'];
                $fullFilePath = $dir . "/" . $fileName;

                // Verplaatst het bestand naar de juiste locatie
                move_uploaded_file($_FILES['file']['tmp_name'], $fullFilePath);

                // Response
                echo $lang['Upload melding'];
                echo "<br />";
                echo $lang['Upload pad'];
                echo "<code>" . $fullFilePath . "</code>";
                echo "<br />";
            } else
            {
                // Geeft fout terug
                echo $lang['Upload error'];
                echo join(", ", $allowedExts) . ". <br />";
            }
        }
        ?>
    </div>
    <input id="textareaupload" class="textareaupload" type="file" name="file" />
    <label for="textareaupload" id="Kies"><?php echo $lang['Kies']; ?></label>
    <input id="SubmitUpload" type="submit" value="Upload" />

</form>