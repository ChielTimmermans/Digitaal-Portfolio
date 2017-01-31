<?php
include 'Create_Database_Inlog.php';
include 'Create_Database_Projecten.php';
include 'Create_Database_gast.php';
include 'Create_Table_cijfers.php';
include 'Create_database_gegevens.php';
include 'Create_database_klas.php';
include 'Create_database_leraar.php';
include 'Create_database_portfolioinhoud.php';
include 'Create_databases_role.php';
include 'Create_table_project_cijfers.php';
include 'dbconnect.php';


$sql = "insert into gegevens VALUES 
        (null,'469521','INF1I','Chiel','Timmermans','Chiel.Timmermans@student.stenden.com','0643550969','1997/04/30','T holt','8','7771PB','Hardenberg','M','1','1','1','1'),
        (Null,'527556','INF1I','Dennis','Kramer','Dennis.Kramer@student.stenden.com','0684083362','1996/09/08','Hahnenberger Diek','110','49824','Emlichheim','M','1','1','1','1'),
        (null,'514942','INF1I','Jefrey','Meijer','Jefrey.Meijer@student.stenden.com','0637451269','1997/06/26','Englumborg','6','9502WZ','Stadskanaal','M','1','1','1','1'),
        (null,'518506','INF1I','Randy','Dijkshoorn','randy.dijkshoorn.dijkshoorn@student.stenden.com','0637313532','1999/06/24','Dr. Koppiusstraat','1','9561RP','Ter Apel','M','1','1','1','1'),
        (null,'520691','INF1I','Leon','Hans','Leon.Hans@student.stenden.com','0646842952','01/07/1999','Goren','10','7761CE','Schoonebeek','M','1','1','1','1')
";
$sql2= "INSERT INTO Klas VALUES 
        ('INF1A'),
        ('INF1B'),
        ('INF1C'),
        ('INF1D'),
        ('INF1E'),
        ('INF1F'),
        ('INF1G'),
        ('INF1H'),
        ('INF1I'),
        ('INF1J')
;";
$sql3= "INSERT INTO portfoliotext VALUES
        ('469521', 'Voer text in', 'Voer text in', 'Voer hier text in', 'Voer text in', 'leeg_profielfoto.jpg'),
        ('527556', 'Voer text in', 'Voer text in', 'Voer hier text in', 'Voer text in', 'leeg_profielfoto.jpg'),
        ('514942', 'Voer text in', 'Voer text in', 'Voer hier text in', 'Voer text in', 'leeg_profielfoto.jpg'),
        ('518506', 'Voer text in', 'Voer text in', 'Voer hier text in', 'Voer text in', 'leeg_profielfoto.jpg'),
        ('520691', 'Voer text in', 'Voer text in', 'Voer hier text in', 'Voer text in', 'leeg_profielfoto.jpg')
";
$sql4= "INSERT INTO projectcijfer VALUES
    ('469521','-','-','-','-','-','-','-','-'),
    ('527556','-','-','-','-','-','-','-','-'),
    ('514942','-','-','-','-','-','-','-','-'),
    ('518506','-','-','-','-','-','-','-','-'),
    ('520691','-','-','-','-','-','-','-','-');
";

$sql5 = "INSERT INTO projecten VALUES
    ('469521','0','0','0','0','0','0','0','0'),
    ('527556','0','0','0','0','0','0','0','0'),
    ('514942','0','0','0','0','0','0','0','0'),
    ('518506','0','0','0','0','0','0','0','0'),
    ('520691','0','0','0','0','0','0','0','0')
";

$sql6= "INSERT INTO users VALUES
    (null,'469521','chiel.timmermans@student.stenden.com','3acf390b4985abe6deb97efed6bf89eba12a1d95925688007ac37a3b9da2f573'),      
    (null,'527556','Dennis.Kramer@student.stenden.com','c6452de67455465219c0fd34619b591e3dbb1283f1763169b099c754982eeb1e'),     
    (null,'514942','Jefrey.Meijer@student.stenden.com','c6452de67455465219c0fd34619b591e3dbb1283f1763169b099c754982eeb1e'),     
    (null,'518506','randy.dijkshoorn.dijkshoorn@student.stenden.com','33657666e136c7abc0685effbfffdef10355ef40ac2a8e0d011b2baefb82074b'),     
    (null,'520691','Leon.Hans@student.stenden.com','ccec8a6d1c21be74b0b3449d8b7e8de6d0e8bee19fc64dc4b2ba2f1e0ce26399'), 
    (null,'123456','leraar.leraar@stenden.com','a455ddd99d859e17c175c7b538a152cc5d16a8c081d56b661ae70e92afcbcb57'), 
    (null,'000001','admin@stenden.com','1ec4dbed2efaf78928b195885407a5d9675a0d836b6d378e518fa85233851da9'), 
    (null,'012345','SLBer@stenden.com','e47d84cbee93a65472483e71cbcc81cc9ac2db9e4f266eb38da5ca2f891324dd')
";       

$sql7= "INSERT INTO cijfer VALUES
    ('469521','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),
    ('527556','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),
    ('514942','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),
    ('518506','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),
    ('520691','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-')
";
$sql8= "INSERT INTO leraren VALUES
    (null,'123456','leraar','leraar','leraar.leraar@stenden.com','0612345678','1930/01/01','hoofdstraat','1','1111AD','Emmen','M','2','PHP','Databases_1','-','N'),
    (null,'000001','ADMIN','admin','admin@stenden.com','0645612378','1935/01/01','hoofdstraat','1','1111AD','Emmen','M','4','-','-','-','N'),
    (null,'012345','SLBer','SLBER','SLBer@stenden.com','0656459263','1939/01/01','hoofdstraat','1','1111AD','Emmen','M','3','-','-','-','Y')
";
mysqli_query($conn, $sql);
mysqli_query($conn, $sql2);
mysqli_query($conn, $sql3);
mysqli_query($conn, $sql4);
mysqli_query($conn, $sql5);
mysqli_query($conn, $sql6);
mysqli_query($conn, $sql7);
mysqli_query($conn, $sql8);



