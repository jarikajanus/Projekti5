<?php
$palvelin = 'localhost';
$kayttaja = 'id12908536_tapahtuma';
$salasana = 'Datan0m1';
$taulu = 'kokeilu';
// muodosta yhteys
$link=mysqli_connect($palvelin,$kayttaja,$salasana);
if(mysqli_connect_error()) {
    die("Tietokantaan ei saatu yhteyttä");
}
echo('Yhteyttä on yritetty linkin arvoilla ' . $palvelin . ', ' . 
                                            $kayttaja . ', ' . 
                                            $salasana);
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

// Luetaan tietokanta

sql = "SELECT * from " . $taulu";
if ($vastaus = mysqli_query($tk_Yhteys,$kysely)) {
    echo ('Tiedot luettu:<br>');
    switch($i) {
    case '1':
        kirjoitaTiedotRuudulle($vastaus);
        break;
    case '2':
        kirjoitaRakenneRuudulle($vastaus);
        echo('<BR>');
        kirjoitaTiedotRuudulle($vastaus);
        break;
    }
} else {
    echo ('Virhe: ' . $vastaus . '<BR>' . mysqli_error($tk_Yhteys));
}
?>