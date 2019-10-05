<?php


if ( $_POST['preis_eingabe_2'] == "preiseingabe_2" ) {
    
$bedingung_3=TRUE; 
    
if ( substr($_POST['artikel_preis_3'], -3, -2) == "." || substr($_POST['artikel_preis_3'], -3, -2) == "," ) {
$_POST['artikel_preis_3']=substr_replace($_POST['artikel_preis_3'], '.', -3, 1);
}

else { $meldung_c="<h1>Preis bitte mit 2 Dezimalstellen (. oder ,) eingeben !</h1>";
       $bedingung_3=FALSE; 
     } 
    

if ( $_POST['artikel'] != 44444 ) {
$artikel_nummer_epreis=$_POST['anbieter_preis_aendern'].$_POST['artikel']; }

if ( $_POST['artikel_bio'] != 44444 ) {
$artikel_nummer_epreis=$_POST['anbieter_preis_aendern'].$_POST['artikel_bio']; }

if ( ( $_POST['artikel'] != 44444 ) && ( $_POST['artikel_bio'] != 44444 ) ) {
      $entweder_oder_2="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte nur EINE Sorte Artikel !</font><br>";
       $bedingung_3=FALSE;
       }
	
	
$select_eartikel=mysqli_query($link," select art_nr from $db_e_preis where art_nr = '$artikel_nummer_epreis' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $result_eartikel = mysqli_fetch_array( $select_eartikel , MYSQLI_BOTH )) {

if ( ( $result_eartikel['art_nr'] != "" ) && ( $bedingung_3 == TRUE ) ) {
    
    
    $artikel_preis_2=$_POST['preiseingabe_2'];    
    
if ( $_POST['sieben'] == $mwstb ) { $artikel_preis_2=$_POST['preiseingabe_2'] / 100 * (100+$mwstb); }
if ( $_POST['neunzehn'] == $mwst ) { $artikel_preis_2=$_POST['preiseingabe_2'] / 100 * (100+$mwst); }    
    
    
   $preis_100_g = ($artikel_preis_2 / $_POST['gramm_packung_2'] );
    
    if ( trim($_POST['einheit_2']) == "g" || trim($_POST['einheit_3']) == "ml" ) {
         $preis_100_g= ($artikel_preis_2/$_POST['gramm_packung_2'] ) * 100;
    } 
    
    
    

mysqli_query($link," update $db_e_preis set
packungsgroesse = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
hundert_g_preis = '$preis_100_g'

where art_nr = '$artikel_nummer_epreis' and laender_kennung = '$_COOKIE[laender_kennung]'
 ");
      
    
    
    
$artikel_nummer_warenkorb = substr("$artikel_nummer_epreis", -4,4 );
    
mysqli_query($link," update $db_warenkorb set
packung = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
preis_100_g = '$preis_100_g'

where art_nr = '$artikel_nummer_warenkorb' and laender_kennung = '$_COOKIE[laender_kennung]' and kaeufer_id = '$_COOKIE[verb_nr]' ");  
    
    
    
} 
} 
}
?>