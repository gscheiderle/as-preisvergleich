<?php

if ( $_POST['preis_ausgabe'] == TRUE ) {

///////////////////////////////////////////////////////////////////////////////////////////////////////////////


if (
   ( ( $_POST['artikel_preise'] != "22222" ) && ( $_POST['anbieter_preis_abfrage'] != "11111" ) ) ||
   ( ( $_POST['artikel_preise_bio'] != "22222" ) && ( $_POST['anbieter_preis_abfrage'] != "11111" ) )
   ) {
if ( $_POST['artikel_preise_bio'] != "22222" ) { $postartikel_preise = $_POST['artikel_preise_bio']; 
                                                 $bio_kennzahl = 1; }
if ( $_POST['artikel_preise'] != "22222" ) { $postartikel_preise = $_POST['artikel_preise']; 
                                             $bio_kennzahl = 0; }

$artikel_nummer_epreis=$_POST['anbieter_preis_abfrage'].$postartikel_preise;

$selectartikel=mysqli_query($link," select artikel as art_ikel, bio_id from $db_artikel where art_nr = '$postartikel_preise' ");
while ( $resultartikel = mysqli_fetch_array( $selectartikel , MYSQLI_BOTH )) {
$bekannterartikel = $resultartikel['art_ikel'];
$bio_kennzahl_db = $resultartikel['bio_id'];
}

$select_anbieter=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$_POST[anbieter_preis_abfrage]' " );
while( $result_anbieter = mysqli_fetch_array( $select_anbieter, MYSQLI_BOTH )) {
$verkaeufer = $result_anbieter['an_bieter'];
}

$select_epreis=mysqli_query($link," select packungsgroesse, einheit, preis from $db_e_preis where art_nr = '$artikel_nummer_epreis' and laender_kennung = '$_COOKIE[laender_kennung]' and bio_id = '$bio_kennzahl_db' ");
while( $result_epreis=mysqli_fetch_array($select_epreis, MYSQLI_BOTH )) {
$packung=$result_epreis['packungsgroesse'];
$packung_einheit=$result_epreis['einheit'];
$packung_preis=$result_epreis['preis'];
}

if ( $bio_kennzahl_db == 1 ) { $bio = "<font style='color: green; font-size: 36px;'>BIO</font>"; }

$hundert_g_preis=($packung_preis/$packung)*100;

$hundert_g_preis=number_format($hundert_g_preis,2,'.',' ');

if ( $packung_preis > 0 ) {

$ergebnis=
"<font style='background-color: yellow;'>".$bekannterartikel."&nbsp;".$bio." bei ".
$verkaeufer."<br>
Packung ".$packung."&nbsp;".$packung_einheit." &euro; ".$packung_preis."<br>
      100 ".$packung_einheit." = &euro; ".$hundert_g_preis."</font>";
}
else { $ergebnis="<font style='color: #FFFFFF; background-color: red;'>Gew&auml;hlter Artikel ist f&uuml;r den Anbieter nicht erfasst !</font>";
}
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}

?>