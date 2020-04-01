   /* Palautemerkkien lukumäärän tarkastus ja näyttäminen */
function Tarkistamerkit(form) 
{
var maxpit=500;
var Teksti=form.lisatiedot.value;
var Merkkejayhteensa=Teksti.length;

form.Merkkejajaljella.value=maxpit-Merkkejayhteensa;
}

    /* email -osoitteen tarkastus, osa 1 */
function emailIsValid(email) 
{
   return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

    /* varsinaisen lomakkeen tarkastus */
function Laheta(form)
{
  var virhekuvaus = 'Testi';

  /* Etunimen tarkistus */
  var etunimi = form.enim.value;
  if(etunimi.length<3)
  {
    virhekuvaus+='Et antanut etunimeäsi tai se on liian lyhyt (min. 3 kirjainta)!<br>';
    return false;
  }

  /* Sukunimen tarkistus */
  var sukunimi = form.snim.value;
  if(sukunimi.length<3)
  {
    virhekuvaus+='Et antanut sukunimeäsi tai se on liian lyhyt (min. 3 kirjainta)!<br>';
    return false;
  }

  /* Lähiosoitteen tarkistus */
  var lahios = form.losoite.value;
  if(lahios.length<10)
  {
    virhekuvaus+='Et antanut sukunimeäsi tai se on liian lyhyt (min. 10 kirjainta)!<br>';
    return false;
  }

  /* Postinumeron tarkistus */
  var postinro = form.pnumero.value;
  if(postinro.length<5)
  {
    virhekuvaus+='Et antanut postinumeroasi tai se on liian lyhyt (5 numeroa)!<br>';
    return false;
  }

  /* Postiosoitteen tarkistus */
  var postiosoite = form.posoite.value;
  if(postiosoite.length<10)
  {
    virhekuvaus+='Et antanut postiosoitettasi tai se on liian lyhyt (min. 10 kirjainta)!<br>';
    return false;
  }

  /* Puhelinnumeron tarkistus */
  var puhelin = form.puhno.value;
  if(puhelin.length<10)
  {
    virhekuvaus+='Et antanut puhelinnumeroasi tai se on liian lyhyt (min. 10 numeroa)!<br>';
    return false;
  }

  /* Sähköpostin tarkastus */
  var spos = form.email.value;
  if(spos.indexOf('@', 0) == -1 || spos.length<10)
  {
    virhekuvaus+='Et antanut sähköpostiosoitettasi tai se on liian lyhyt (min. 10 kirjainta)!<br>'
    return false;
  }

  /* Työnantajatiedon tarkistus */
  var tant = form.tyonantaja.value;
  if(tant.length<10)
  {
    virhekuvaus+='Et kirjoittanut työnantatietoa tai se on liian lyhyt (min. 10 kirjainta)!<br>';
    return false;
  }

  /* Ammattinimikkeen tarkistus */
  var amni = form.ammattinimike.value;
  if(amni.length<10)
  {
    virhekuvaus+='Et ilmoittanut ammattinimiketietoa tai se on liian lyhyt (min. 10 kirjainta)!<br>';
    return false;
  }

  /* Syntymäajan tarkistus */
  var saik = form.syntAika.value;
  alert('kalenterimerkinnän koodi:'+saik);
  if(saik.value='')
  {
    virhekuvaus+='Et ilmoittanut syntymäaikaasi tai olet alaikäinen (min. 18 vuotta)!<br>';
    return false;
  }

  /* Hinnan tarkastus */
  var valittu = -1;
  for(i = 1; i<=3; i++) 
  {
    var valittu2 = document.getElementById(i).selected;
    if(valittu2) valittu = i;
  }

  if(valittu==-1) 
  {
    virhekuvaus+='Jokin hinta on valittava<br>';
    return false;
  }
    
    document.getElementById('virhe').innerHTML = virhekuvaus;
}