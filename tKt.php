<?php
function luoYhteys($sN,$uN,$Pw) {
    // Yhteyden luonti
    $tk_Yhteys = mysqli_connect($sN,$uN,$Pw);
    echo('<p>serverName = ' . $sN . ', userName = ' . $uN . ', password = ' . $Pw . '.</p>');
    // Yhteyden tarkastus
    if (mysqli_connect_error()) {
        die('Tietokantaan ei saatu yhteyttä');
    }
    return($tk_Yhteys);
}

function luoYhteysTietokantaan($sN,$uN,$Pw,$tN) {
    // Yhteyden luonti Tietokantaan
    $tk_Yhteys = mysqli_connect($sN,$uN,$Pw,$tN);
    echo('<p>serverName = ' . $sN . ', 
    userName = ' . $uN . ', 
    password = ' . $Pw . ', 
    database = ' . $tN . '.</p>');
    // Yhteyden tarkastus
    if (mysqli_connect_error()) {
        die('Tietokantaan ei saatu yhteyttä');
    }
    return($tk_Yhteys);
}

function tietokannanLuonti($sN,$uN,$Pw,$tN) {  // Ei käytössä
    $tk_Yhteys=luoYhteys($sN,$uN,$Pw);
    // Tietokannan luonti
    $sql='CREATE DATABASE ' . $tN;
    echo('<p>sql = ' . $sql . '.</P>');
    if ($vastaus = mysqli_query($tk_Yhteys, $sql)) {
        echo 'Tietokannan luonti onnistui.';
    } else {
        echo 'Virhe tietokannan luonnissa: ' . mysqli_error($tk_Yhteys);
    }
    mysqli_close($tk_Yhteys);
}

function taulunLuonti($sN,$uN,$Pw,$dN,$tN) {
    $tk_Yhteys=luoYhteysTietokantaan($sN,$uN,$Pw,$dN);
    // Taulun luonti
    $YTK=$sN.'.'.$tN;
    echo('<p>YTK = ' . $YTK . ', taulu = ' . $tN . '.</P>');
    $sql = 'CREATE TABLE ' .  $tN .
        '(enim VARCHAR(30) NOT NULL,
        snimi VARCHAR(30) NOT NULL,
        losoite VARCHAR(30) NOT NULL,
        pnumero VARCHAR(5) NOT NULL,
        posoite VARCHAR(30) NOT NULL,
        puhno VARCHAR(15) NOT NULL,
        email VARCHAR(35) NOT NULL,
        tyonantaja VARCHAR(30) NOT NULL,
        ammattinimike VARCHAR(30) NOT NULL,
        syntAika DATE NOT NULL,
        hinta INT(4) NOT NULL,
        erRuoka VARCHAR(50),
        lisatiedot VARCHAR(100))';
    echo('<p>sql -lause = ' . $sql . '</p>');
    if (mysqli_query($tk_Yhteys, $sql)) {
        echo ('Uusi tietokantarakenne luotu.');
    } else {
        echo ('Virhe: ' . $sql . '<BR>' . mysqli_error($tk_Yhteys));
    }
    mysqli_close($tk_Yhteys);
}

function esitaTiedot() {
    $enimi=$_GET['enim'];
    $snimi=$_GET['snim'];
    $losoite=$_GET['losoite'];
    $pnumero=$_GET['pnumero'];
    $posoite=$_GET['posoite'];
    $puhno=$_GET['puhno'];
    $email=$_GET['email'];
    $tyonAntaja=$_GET['tyonantaja'];
    $ammattinimike=$_GET['ammattinimike'];
    $syntAika=$_GET['syntAika'];
    $hinta=$_GET['hinta'];
    $erRuoka=$_GET['erRuoka'];
    $lisatiedot=$_GET['lisatiedot'];
    echo('<table>');
        echo('<tr>');
            echo('<td><label for="enim">Etunimi:</label></td>');
            echo('<td>' . $enimi . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="snim">Sukunimi:</label></td>');
            echo('<td>' . $snimi . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="pnumero">Lähiosoite:</label></td>');
            echo('<td>' . $losoite . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="pnum">Postinumero:</label></td>');
            echo('<td>' . $pnumero . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="enim">Postitoimipaikka:</label></td>');
            echo('<td>' . $posoite . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="puhno">Puhelinnumero:</label></td>');
            echo('<td>' . $puhno . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="email">Sähköpostiosoite:</label></td>');
            echo('<td>' . $email . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="tyonAntaja">Työnantaja:</label></td>');
            echo('<td>' . $tyonAntaja . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="ammattinimike">Ammattinimike:</label></td>');
            echo('<td>' . $ammattinimike . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="syntAika">Syntymäaika:</label></td>');
            echo('<td>' . $syntAika . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="hinta">Tapahtuman hinta:</label></td>');
            echo('<td>' . $hinta . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="erRuoka">Erityisruokavalio:</label></td>');
            echo('<td>' . $erRuoka . '</td>');
        echo('</tr>');
        echo('<tr>');
            echo('<td><label for="lisatiedot">Lisätietoja:</label></td>');
            echo('<td>' . $lisatiedot . '</td>');
        echo('</tr>');
    echo('</table>');
}

function kirjoitaTiedot($sN,$uN,$Pw,$dN,$tN) {
    echo('<p>Tietoja kirjoitetaan ...</p>');
    $tk_Yhteys=luoYhteysTietokantaan($sN,$uN,$Pw,$dN);
    $enimi=$_GET['enim'];
    $snimi=$_GET['snim'];
    $losoite=$_GET['losoite'];
    $pnumero=$_GET['pnumero'];
    $posoite=$_GET['posoite'];
    $puhno=$_GET['puhno'];
    $email=$_GET['email'];
    $tyonAntaja=$_GET['tyonantaja'];
    $ammattinimike=$_GET['ammattinimike'];
    $syntAika=$_GET['syntAika'];
    $hinta=$_GET['hinta'];
    $erRuoka=$_GET['erRuoka'];
    $lisatiedot=$_GET['lisatiedot'];
    
    $kysely = 'INSERT INTO ' . $tN . ' (enim, snimi, losoite,
                        pnumero, posoite, puhno, email, tyonantaja,
                        ammattinimike, syntAika, hinta, erRuoka, lisatiedot)
    VALUES (' . $enimi . ', ' . $snimi . ', ' . $losoite . ', ' . $pnumero . ', ' . $posoite . ', ' . $puhno . ', ' . $email . ', '
    . $tyonAntaja . ', ' . $ammattinimike . ', ' . $syntAika . ', ' . $hinta . ', ' . $erRuoka . ', ' . $lisatiedot . ')';
    
    if (mysqli_query($tk_Yhteys, $kysely)) {
        echo ('Uudet tiedostot päivitetty.');
    } else {
        echo ('Virhe: ' . $kysely . '<BR>' . mysqli_error($tk_Yhteys));
    }
}

function lueTiedot($i,$sN,$uN,$Pw,$dN,$tN) {
    echo('<p>Tietoja luetaan ...</p>');
    $tk_Yhteys=luoYhteysTietokantaan($sN,$uN,$Pw,$dN);
    $kysely = 'SELECT * from ' . $tN;
    if ($vastaus = mysqli_query($tk_Yhteys,$kysely)) {
        echo ('Tiedot luettu:<br>');
        kirjoitaTiedotRuudulle($vastaus);
    }
    else {
        echo ('Virhe: ' . $vastaus . '<BR>' . mysqli_error($tk_Yhteys));
    }
}

function kirjoitaTiedotRuudulle($vastaus) {
    echo('<table>');
    while($rivit = $vastaus->fetch_assoc()) {
        echo('<tr><td>');
        echo('<label for="enim">Etunimi</label></td><td>');
        echo($rivit["enim"] . '</td>');
        echo('<tr><td>');
        echo('<label for="snimi">Sukunimi</label></td><td>');
        echo($rivit["snimi"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="losoite">Lähiosoite</label></td><td>');
        echo($rivit["losoite"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="pnumero">Postinumero</label></td><td>');
        echo($rivit["pnumero"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="posoite">Postitoimipaikka</label></td><td>');
        echo($rivit["posoite"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="puhno">Puhelinnumero</label></td><td>');
        echo($rivit["puhno"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="email">Sähköposti</label></td><td>');
        echo($rivit["email"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="Tyonantaja">Tyonantaja</label></td><td>');
        echo($rivit["Tyonantaja"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="Ammattinimike">Ammattinimike</label></td><td>');
        echo($rivit["Ammattinimike"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="syntAika">Syntymäaika</label></td><td>');
        echo($rivit["syntAika"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="hinta">Hinta</label></td><td>');
        echo($rivit["hinta"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="erRuoka">Erityisruokavalio</label></td><td>');
        echo($rivit["erRuoka"] . '</td><td>');
        echo('<tr><td>');
        echo('<label for="lisatiedot">Lisätiedot</label></td><td>');
        echo($rivit["lisatiedot"] . '</td></tr>');
    }
    echo('</table>');
}
?>