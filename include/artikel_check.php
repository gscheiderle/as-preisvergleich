
<?php

if ( $_POST['preis_eingabe_3'] == "preiseingabe_3" )  { // IF 1
    
$bedingung=TRUE; 
    
if ( substr($_POST['artikel_preis_3'], -3, -2) == "." || substr($_POST['artikel_preis_3'], -3, -2) == "," ) {
$_POST['artikel_preis_3']=substr_replace($_POST['artikel_preis_3'], '.', -3, 1);
}

else { $meldung_c="<h1>Preis bitte mit 2 Dezimalstellen (. oder ,) eingeben !</h1>";
       $bedingung=FALSE; 
     }  


if ( $_POST['anbieter_3'] == 30000 ) {
$kein_anbieter="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte einen Anbieter w&auml;hlen !</font><br>";
$bedingung=FALSE;
}

if ( $_POST['neue_artikel_3'] != "" ) {
$textfeld_leeren="Bitte das Feld f&uuml;r neue Artikel leeren !";
$bedingung=FALSE;
}

if ( ( $_POST['kategorie_3'] == 20000 ) && ( $_POST['kategorie_bio_3'] == 20000 ) ) { 
$keine_kategorie="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte eine Kategorie w&auml;hlen !</font><br>";
$bedingung = FALSE; }


if ( $_POST['artikel_preis_3'] == "" ) { 
$kein_preis="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte einen Preis angeben !</font><br>";
$bedingung = FALSE; }


if ( $bedingung == TRUE ) {

if ( $_POST['kategorie_3'] != 20000 ) {$bio_kennzahl = 0; 
                                       $postkategorie = $_POST['kategorie_3']; }
if ( $_POST['kategorie_bio_3'] == TRUE ) {$bio_kennzahl = 1; 
                                       $postkategorie = $_POST['kategorie_3']; }
	
if ( $_POST['artikel_3'] != 10000 ) { $postartikel=$_POST['artikel_3']; }
// if ( $_POST['artikel_bio_3'] != 10000 ) { $postartikel=$_POST['artikel_bio_3']; }                                     

$artikel_nummer_epreis=$_POST['anbieter_3'].$postartikel;

$suche_vorhandene=mysqli_query($link," select art_nr from $db_e_preis where art_nr = '$artikel_nummer_epreis' and bio_id = '$bio_kennzahl' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $resultvorhandene = mysqli_fetch_array( $suche_vorhandene , MYSQLI_BOTH )) { // while 1
$result_vorhandene=$resultvorhandene['art_nr'];
}
	
$selectartikel=mysqli_query($link, "select artikel from $db_artikel where art_nr = '$postartikel' ");
	while( $resultartikel = mysqli_fetch_array( $selectartikel, MYSQLI_BOTH ) ) {
		$result_artikel=$resultartikel['artikel'];
	}
    
    
$artikel_preis_3=$_POST[artikel_preis_3];    
    
if ( $_POST['sieben'] == $mwstb ) { $artikel_preis_3=$_POST[artikel_preis_3] / 100 * (100+$mwstb); }
if ( $_POST['neunzehn'] == $mwst ) { $artikel_preis_3=$_POST[artikel_preis_3] / 100 * (100+$mwst); }    
    
    
   $preis_100_g = ($artikel_preis_3 / $_POST['gramm_packung_3'] );
    
    if ( trim($_POST['einheit_3']) == "g" || trim($_POST['einheit_3']) == "ml" ) {
         $preis_100_g= ($artikel_preis_3/$_POST['gramm_packung_3'] ) * 100;
    }    
        
    

if ( $result_vorhandene == "" ) { // IF 2
	

$neue_einheit_31=$_POST[einheit_3];  
$neue_einheit_31=htmlspecialchars($neue_einheit_31);
	
	
	$selectartikel=mysqli_query($link, "select artikel from $db_artikel where art_nr = '$postartikel' ");
	while( $resultartikel = mysqli_fetch_array( $selectartikel, MYSQLI_BOTH ) ) {
		$result_artikel=$resultartikel['artikel'];
	}


	

mysqli_query($link," insert into $db_e_preis 
( 
laender_kennung,
kd_nr, 
kat_id,
bio_id,
art_nr, 
art_nr_short,
artikel,
packungsgroesse, 
einheit,
preis,
hundert_g_preis
) 
values 
(
'$_COOKIE[laender_kennung]',
'$_POST[anbieter_3]',
'$postkategorie',
'$bio_kennzahl',
'$artikel_nummer_epreis',
'$postartikel',
'$result_artikel',
'$_POST[gramm_packung_3]',
'$neue_einheit_31',
'$artikel_preis_3',
'$preis_100_g'
)
");

}  // ende IF 2


if ( $result_vorhandene != "" ) { // IF 3
    
mysqli_query($link," update $db_e_preis set

packungsgroesse = '$_POST[gramm_packung_3]',
preis = '$artikel_preis_3',
hundert_g_preis = '$preis_100_g'

where art_nr = '$artikel_nummer_epreis' ");
    
    
mysqli_query($link," update $db_warenkorb set

packung = '$_POST[gramm_packung_3]',
preis = '$artikel_preis_3',
preis_100_g = '$preis_100_g'

where art_nr = '$postartikel' ");   
      
    

$hinweis_1="<h2><font style='color: #FFFFFF; background-color: red;'>Gew&auml;hlter Artikel ist f&uuml;r den Anbieter schon erfasst !<br>
Packungsgr&ouml;&szlig;e und Preis wurden &uuml;berschrieben!</font></h2>";

} // ende IF bedingung

} // ende IF 3
} // ende IF 1



?>