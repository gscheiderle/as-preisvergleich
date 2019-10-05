<?php 

if ( $_POST['preis_ausgabe'] == "preisausgabe" ) {

$bedingung_2=TRUE;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if     ( ( $_POST['artikel_preise'] != "22222" ) && ( $_POST['artikel_preise_bio'] != "22222" ) )  {
       echo $entweder_oder="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte nur EINE Sorte Artikel !</font><br>";
       $bedingung_2=FALSE;}


if ((  $_POST['anbieter_preis_abfrage'] == "11111" ) && ( ( $_POST['artikel_preise'] != "22222" ) || ( $_POST['artikel_preise_bio'] != "22222" ) ) ) {


if ( $_POST['artikel_preise'] != "22222" ) { $artikel_nummer = $_POST['artikel_preise'];
                                          $bio_kennzahl = 0; }
if ( $_POST['artikel_preise_bio'] != "22222" ) { $artikel_nummer = $_POST['artikel_preise_bio'];
                                          $bio_kennzahl = 1; }                                          
if ( $bedingung_2 == TRUE ) {
echo "<table>";

$select_kdnr=mysqli_query($link," select distinct kd_nr, packungsgroesse, einheit, preis from $db_e_preis where art_nr like '%$artikel_nummer' and laender_kennung = '$_COOKIE[laender_kennung]' and bio_id = '$bio_kennzahl' ");
while( $result_kdnr=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH )) {

$hundert_gramm_preis=($result_kdnr['preis']/$result_kdnr['packungsgroesse'])*100;
$hundert_gramm_preis=number_format($hundert_gramm_preis,2,'.',' ');
$select_kd_name=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$result_kdnr[kd_nr]' ");
while ( $result_kdname = mysqli_fetch_array($select_kd_name, MYSQLI_BOTH )) {

if ( $bio_kennzahl == 1 ) { $bio = "<font style='color: green; font-size: 36px;'>&nbsp;BIO</font>"; }
                          else { $bio = ""; }

echo "<tr><td style=' text-align: left;  width: 100%;'>".$result_kdname['an_bieter'].$bio." Packg. ".$result_kdnr['packungsgroesse']."&nbsp;".$result_kdnr['einheit']." </td></tr>
<tr><td style=' text-align: right;  width: 100%;'>100 g ".$hundert_gramm_preis." &euro; </td></tr>";
}
}
echo "</table>";
}
}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>