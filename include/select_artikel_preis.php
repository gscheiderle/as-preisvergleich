<?php


if ( $_POST['preis_ausgabe'] == TRUE ) {

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ( ( $_POST['anbieter_preis_abfrage'] == "11111" ) && ( $_POST['artikel_preise'] != "22222" ) ) {

echo "<table style=' width: 700px; color: #000; '>";

$select_kdnr=mysqli_query($link," select distinct kd_nr, packungsgroesse, preis from $db_e_preis where art_nr like '%$_POST[artikel_preise]' ");
while( $result_kdnr=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH )) {

$hundert_gramm=($result_kdnr['preis']/$result_kdnr['packungsgroesse'])*100;
$hundert_gramm=number_format($hundert_gramm,2,'.',' ');
$select_kd_name=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$result_kdnr[kd_nr]' ");
while ( $result_kdname = mysqli_fetch_array($select_kd_name, MYSQLI_BOTH )) {


echo "<tr><td align='left' width='65%'><h3>".$result_kdname['an_bieter']." Packg. ".$result_kdnr['packungsgroesse']." g </td> <td align='right' width='35%'><h3> 100 g ".$hundert_gramm." &euro; </td></tr>";
}
}
echo "</table>";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ( ( $_POST['artikel_preise'] == "22222" ) && ( $_POST['anbieter_preis_abfrage'] != "11111" ) ) {



$select_epreis=mysqli_query($link," select art_nr, packungsgroesse, einheit, preis from $db_e_preis where kd_nr = '$_POST[anbieter_preis_abfrage]' ");
while( $result_epreis=mysqli_fetch_array($select_epreis, MYSQLI_BOTH )) {
$epreis_artnr=$result_epreis['art_nr'];
$packung=$result_epreis['packungsgroesse'];
$epreis_einheit=$result_epreis['einheit'];
$packung_preis=$result_epreis['preis'];
$epreis_artnr=$result_epreis['art_nr'];

$artikelname=substr("$epreis_artnr",4,4);

$selectartikel=mysqli_query($link," select artikel as art_ikel from $db_artikel where art_nr = '$artikelname' ");
while ( $resultartikel = mysqli_fetch_array( $selectartikel , MYSQLI_BOTH )) {
$bekannterartikel = $resultartikel['art_ikel'];
}

$select_anbieter=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$_POST[anbieter_preis_abfrage]' " );
while( $result_anbieter = mysqli_fetch_array( $select_anbieter, MYSQLI_BOTH )) {
$verkaeufer = $result_anbieter['an_bieter'];
}

$hundert_g_preis=($packung_preis/$packung)*100;

$hundert_g_preis=number_format($hundert_g_preis,2,'.',' ');



$ergebnisse=["<font style='background-color: yellow;'>".$bekannterartikel." bei ".
$verkaeufer."<br>
Packung ".$packung."&nbsp;".$epreis_einheit." &euro; ".$packung_preis."<br>
      100 g = &euro; ".$hundert_g_preis."</font><br><br>",];





foreach ($ergebnisse as $value ) {
echo $value;
}  
}
} 



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




if ( ( $_POST['artikel_preise'] != "22222" ) && ( $_POST['anbieter_preis_abfrage'] != "11111" ) ) {


$artikel_nummer_epreis=$_POST['anbieter_preis_abfrage'].$_POST['artikel_preise'];

$selectartikel=mysqli_query($link," select artikel as art_ikel from $db_artikel where art_nr = '$_POST[artikel_preise]' ");
while ( $resultartikel = mysqli_fetch_array( $selectartikel , MYSQLI_BOTH )) {
$bekannterartikel = $resultartikel['art_ikel'];
}

$select_anbieter=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$_POST[anbieter_preis_abfrage]' " );
while( $result_anbieter = mysqli_fetch_array( $select_anbieter, MYSQLI_BOTH )) {
$verkaeufer = $result_anbieter['an_bieter'];
}

$select_epreis=mysqli_query($link," select packungsgroesse, einheit, preis from $db_e_preis where art_nr = '$artikel_nummer_epreis' ");
while( $result_epreis=mysqli_fetch_array($select_epreis, MYSQLI_BOTH )) {
$packung=$result_epreis['packungsgroesse'];
$packung_einheit=$result_epreis['einheit'];
$packung_preis=$result_epreis['preis'];
}

$hundert_g_preis=($packung_preis/$packung)*100;

$hundert_g_preis=number_format($hundert_g_preis,2,'.',' ');

if ( $packung_preis > 0 ) {

$ergebnis=
"<font style='background-color: yellow;'>".$bekannterartikel." bei ".
$verkaeufer."<br>
Packung ".$packung."$packung_einheit".$packung_einheit."&nbsp;&euro;&nbsp;".$packung_preis."<br>
      100 Einheiten = &euro; ".$hundert_g_preis."</font>";
}
else { $ergebnis="<font style='color: #FFFFFF; background-color: red;'>Gew&auml;hlter Artikel ist f&uuml;r den Anbieter nicht erfasst !</font>";
}
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}

?>