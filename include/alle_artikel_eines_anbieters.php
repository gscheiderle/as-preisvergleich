<?php

if ( $_POST['preis_ausgabe'] == TRUE ) {


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ( ( $_POST['artikel_preise'] == "22222" ) && ( $_POST['artikel_preise_bio'] == "22222" ) && ( $_POST['anbieter_preis_abfrage'] != "11111" ) ) {

$bio_kennzahl = 0;

$bio_abfrage="kd_nr = '$_POST[anbieter_preis_abfrage]' and laender_kennung = '$_COOKIE[laender_kennung]' and bio_id = '1' or
              kd_nr = '$_POST[anbieter_preis_abfrage]' and laender_kennung = '$_COOKIE[laender_kennung]' and bio_id = '0'  ";


if ( $_POST['nur_bio'] == "nurbio" ) { 
$bio_abfrage="kd_nr = '$_POST[anbieter_preis_abfrage]' and laender_kennung = '$_COOKIE[laender_kennung]' and bio_id = '1' ";
$bio_kennzahl = 1; }


$select_epreis=mysqli_query($link," select art_nr, packungsgroesse, einheit, preis from $db_e_preis where $bio_abfrage ");
while( $result_epreis=mysqli_fetch_array($select_epreis, MYSQLI_BOTH )) {
$epreis_artnr=$result_epreis['art_nr'];
$packung=$result_epreis['packungsgroesse'];
$epreis_einheit=$result_epreis['einheit'];
$packung_preis=$result_epreis['preis'];

    $bio_kennzahl_db=0;

$artikelname=substr("$epreis_artnr",4,4);

$selectartikel=mysqli_query($link," select art_nr, artikel as art_ikel, bio_id from $db_artikel where art_nr = '$artikelname' ");
while ( $resultartikel = mysqli_fetch_array( $selectartikel , MYSQLI_BOTH )) {
$bekannterartikel = $resultartikel['art_ikel'];
$bio_kennzahl_db = $resultartikel['bio_id'];
}

$select_anbieter=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$_POST[anbieter_preis_abfrage]' " );
while( $result_anbieter = mysqli_fetch_array( $select_anbieter, MYSQLI_BOTH )) {
$verkaeufer = $result_anbieter['an_bieter'];
}

$hundert_g_preis=($packung_preis/$packung)*100;

$hundert_g_preis=number_format($hundert_g_preis,2,'.',' ');

if ( $bio_kennzahl_db == 1 ) { $bio = "<font style='color: green; font-size: 36px;'>&nbsp;BIO</font>"; }
                          else { $bio = ""; }

echo $ergebnisse="<font style='background-color: yellow;'>".$bekannterartikel.$bio." bei ".
$verkaeufer."<br>

Packung ".$packung."&nbsp;".$epreis_einheit." &euro; ".$packung_preis."<br>
      100&nbsp;".$epreis_einheit." = &euro; ".$hundert_g_preis."</font><br><br>";





/*foreach ($ergebnisse as $value ) {
 echo $value;
} */
}
} 

}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>