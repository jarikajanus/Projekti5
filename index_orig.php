<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Responsiiviset sivut -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Käytetään CSS tiedostoa -->
    <!-- <link rel="stylesheet" type="text/css" href="Projekti4.css"> -->
    <!-- Liitetty Javascript -->
    <!-- <script type="text/javascript" src="Funktiot.js"></script> -->
    <!-- Liitetty PHP tiedosto-->
    <?php include 'tKt.php';?>
    <!-- Sivuston välilehden nimi -->
    <title>Tietokantakokeilu</title>
</head>
<body>
<?php

/*
$palvelin = 'sql210.byetcluster.com';
$kayttaja = 'EPIZ_25300333';
$salasana = 'vtnm42c0';
$tietokanta = 'EPIZ_25300333_Projekti5';
$taulu = 'testiDB';
*/

$palvelin = 'localhost';
$kayttaja = 'root';
$salasana = '';
$tietokanta = 'Projekti5';
$taulu = 'Tapahtuma';

// muodosta yhteys
$link=mysqli_connect($palvelin,$kayttaja,$salasana);
if(mysqli_connect_error()) {
    die("Tietokantaan ei saatu yhteyttä");
}
echo('Yhteyttä on yritetty linkin arvoilla ' . $palvelin . ', ' . 
                                            $kayttaja . ', ' . 
                                            $salasana);

// Luodaan uusi tietokanta - valmis
$sql = "CREATE DATABASE " . $tietokanta;
echo('<p>sql -lause = ' . $sql . '</p>');
if($conn=mysqli_query($link,$sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Luetaan tietokannan sisältö
$sql = "SELECT * from " . $taulu;
echo('<p>sql -lause = ' . $sql . '</p>');

// muodosta uusi yhteys
mysqli_close($link);
$link=mysqli_connect($palvelin,$kayttaja,$salasana,$tietokanta);
if(mysqli_connect_error()) {
    die("Tietokantaan ei saatu yhteyttä");
}
echo('Yhteyttä on yritetty linkin arvoilla ' . $palvelin . ', ' . 
                                            $kayttaja . ', ' . 
                                            $salasana . ', ' . 
                                            $tietokanta);


// Luodaan uuteen tietokantaan taulu
$sql = "CREATE TABLE " . $taulu . " (
    etunimi VARCHAR(30) NOT NULL,
    sukunimi VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
echo('<p>sql -lause = ' . $sql . '</p>');
if (mysqli_query($link, $sql)) {
    echo ('Uusi tietokantarakenne luotu.');
} else {
    echo ('Virhe: ' . $sql . '<BR>' . mysqli_error($link));
}
// Kirjoitetaan uuteen tauluun sisältöä

$sql = "INSERT INTO " . $taulu . "(etunimi, sukunimi, email, reg_date)
VALUES ('Jari','Kajanus','jari.kajanus@nic.fi','15.10.1965')";
echo('<p>sql -lause = ' . $sql . '</p>');
if (mysqli_query($link, $sql)) {
    echo ('Uusi tietokannan sisältö luotu.');
} else {
    echo ('Virhe: ' . $sql . '<BR>' . mysqli_error($link));
}

mysqli_close($link);

?>
</body>
</html>

<!--
$serverName = 'sql210.epizy.com';
$userName = 'EPIZ_25300333';
$dbPassWord = 'JariJyri123';
$dbName = 'EPIZ_25300333_Projekti5';
$tableName = 'Tapahtuma';¨
$testiDB = 'testiDB';
-->