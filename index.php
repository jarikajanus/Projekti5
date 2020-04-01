<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Responsiiviset sivut -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Käytetään CSS tiedostoa -->
    <link rel="stylesheet" type="text/css" href="LomakeStyle.css">
    <!-- Sivuston välilehden nimi -->
    <title>Ilmoittautuminen tapahtumaan</title>
</head>
<body>
    <!-- Liitetty PHP tiedosto-->
    <?php include "tKt.php";?>
    <!-- Liitetty Javascript -->
    <script type="text/javascript" src="JS_Funktiot.js"></script>
    <?php
        $a = 'localhost';   //serverName
        $b = 'root';        //userName
        $c = '';            //dbPassWord
        $d = 'Projekti5';   //dbName
        $e = 'Tapahtuma';   //tableName
    ?>
    <section>
    <img src="workshop.jpg"><br/>        
    <h1>Ilmoittautuminen tapahtumaan</h1>
            <div id="virhe"></div>
            <form method="get" action="Ilmo.php" onSubmit="return Laheta(this)">
                <table>
                <!--Etunimi-->
                <tr>
                    <td><label for="enim">Etunimi:</label></td>
                    <td><input type="text" name="enim" id="enim"></td>
                </tr>
                <!--Sukunimi-->
                <tr>
                    <td><label for="snim">Sukunimi:</label></td>
                    <td><input type="text" name="snim" id="snim"></td>
                </tr>
                <!--Lähiosoite-->
                <tr>
                    <td><label for="losoite">Lähiosoite:</label></td>
                    <td><input type="text" name="losoite" id="losoite"></td>
                </tr>
                <!--Postinumero-->
                <tr>
                    <td><label for="pnumero">Postinumero:</label></td>
                    <td><input type="text" name="pnumero" id="pnumero"></td>
                </tr>
                <!--Postitoimipaikka-->
                <tr>
                    <td><label for="posoite">Postitoimipaikka:</label></td>
                    <td><input type="text" name="posoite" id="posoite"></td>
                </tr>
                <!--Puhelinnumero-->
                <tr>
                    <td><label for="puhno">Puhelinnumero:</label></td>
                    <td><input type="text" name="puhno" id="puhno"></td>
                </tr>
                <!--Sähköpostiosoite-->
                <tr>
                    <td><label for="email">Sähköpostiosoite:</label></td>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <!--Työnantaja-->
                <tr>
                    <td><label for="tyonantaja">Työnantaja:</label></td>
                    <td><input type="text" name="tyonantaja" id="tyonantaja"></td>
                <tr>
                <!--Ammattinimike-->
                <tr>
                    <td><label for="ammattinimike">Ammattinimike:</label></td>
                    <td><input type="text" name="ammattinimike" id="ammattinimike"></td>
                </tr>
                <!--Syntymäaika-->
                <tr>
                <td><label for="Syntymäaika">Syntymäaika:</label></td>
                <td><input type="date" name="syntAika" id="syntAika" max='2002-01-01'></td>
                </tr>
                <!--Hinta-->
                <tr>
                <td>
                    <label for="hinta">Hinta:</label>
                <td>
                    <table>
                        <tr>
                            <td><input type="radio" name="hinta" id="10">10€     </td>
                            <td><input type="radio" name="hinta" id="50">50€     </td>
                            <td><input type="radio" name="hinta" id="70">70€     </td>
                        </tr>
                    </table>
                </td>
                </tr>
                <!--Ruokavalio-->
                <tr>
                    <td><label for="erRuoka">Erityisruokavalio</label></td>
                    <td><input type="text" name="erRuoka" id="erRuoka"></td>
                </tr>
                <!--Lisätiedot-->
                <tr>
                    <td><label for="lisatiedot">Lisätietoja:</label></td>
                    <td><textarea name="lisatiedot" id="lisatiedot" cols="21" rows="5"
                    placeholder="Kirjoita lisätiedot" value=""
                    onFocus="return Tarkistamerkit(this.form)"
                    onKeyDown="return Tarkistamerkit(this.form)"
                    onKeyUp="return Tarkistamerkit(this.form)"
                    onblur="return Tarkistamerkit(this.form)">
                    </textarea></td>
                </tr>
                <tr>
                <td><label for="Merkkejajaljella">Merkkejäjäljellä:</label></td>
                <td>
                    <input name="Merkkejajaljella" id="Merkkajajaljella" type="text" readonly="readonly" value="500" />
                </td>
                </tr>
                </table>
                <p>
                <input type="submit" value="Lähetä vastaukset">
                </p>
            </form>
        </section>
</body>
</html>