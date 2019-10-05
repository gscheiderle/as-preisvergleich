
<?php

if ( ( $_POST['preis_eingabe_3'] == "preiseingabe_3" ) && ( $_POST['neue_artikel_3'] != "" ) ) { // IF 1
    
if ( substr("$_POST[neue_artikel_3]",-9,4) != 9999 )  {     

$bedingung_1 = TRUE;


if ( $_POST['kategorie_3'] != 20000 ) {$bio_kennzahl = 0; 
                                       $postkategorie = $_POST['kategorie_3']; }
if ( $_POST['kategorie_bio_3'] != 20000 ) {$bio_kennzahl = 1; 
                                       $postkategorie = $_POST['kategorie_bio_3']; }
    
    
/* $neue_artikel_3=$_POST['neue_artikel_3'];  
$neue_artikel_3=htmlentities($neue_artikel_3);  */

$neue_artikel_3=$_POST[neue_artikel_3];  
echo htmlspecialchars($neue_artikel_3);


$select_doppelte_artikel=mysqli_query($link," select kat_id, bio_id, artikel as ar_tikel from $db_artikel where artikel.artikel = '$neue_artikel_3' and kat_id = '$postkategorie' and bio_id = '$bio_kennzahl' ");
while ( $result_doppelte_artikel = mysqli_fetch_array( $select_doppelte_artikel , MYSQLI_BOTH )) {
if ( $result_doppelte_artikel['ar_tikel'] != "" ) {

$neuer_artikel_schon_vorhanden="<h3><font style='color: #FFFFFF; background-color: red;'>Diesen Artikel finden Sie<br>
bei den bekannten Artikeln !<br></h2>";
$bedingung_1 = FALSE;
} // ende IF
} // ende while

if ( $_POST['anbieter_3'] == 30000 ) {
$kein_anbieter="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte einen Anbieter w&aauml;hlen !</font><br>";
$bedingung_1=FALSE;
}

if ( ($_POST['kategorie_3'] == 20000 ) && ( $_POST['kategorie_bio_3'] == 20000 ) ) { 
$keine_kategorie="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte eine Kategorie w&auml;hlen !</font><br>";
$bedingung_1 = FALSE; }

if ( ( $_POST['kategorie_3'] != 20000 ) && ( $_POST['kategorie_bio_3'] != 20000 ) ) { 
$keine_kategorie="<h3><font style='color: #FFFFFF; background-color: red;'>Nur EINE Kategorie w&auml;hlen !</font><br>";
$bedingung_1 = FALSE; }

if ( $_POST['artikel_preis_3'] == "" ) { 
$kein_preis="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte einen Preis angeben !</font><br>";
$bedingung_1 = FALSE; }


if ( $bedingung_1 == TRUE ) {



mysqli_query($link,"LOCK TABLES $db_artikel_nr write, $db_artikel_nr as $db_artikel_nr read");

$select_art_nr_3 = mysqli_query($link,"select max(art_nr) + 1 as artnr from $db_artikel_nr ");
while ($result_artnr=mysqli_fetch_array( $select_art_nr_3 , MYSQLI_BOTH )) {
$neueartnr=$result_artnr['artnr'];

mysqli_query($link," insert into $db_artikel_nr (art_nr) values ('$neueartnr') ");

mysqli_query($link,"UNLOCK TABLES");
    
$neue_artikel_3=$_POST['neue_artikel_3'];  
$neue_artikel_3=htmlentities($neue_artikel_3);   
    

mysqli_query($link," insert into $db_artikel ( kat_id, bio_id, art_nr, artikel) values ( '$postkategorie', '$bio_kennzahl', '$neueartnr', '$neue_artikel_3' ) ");


$artikel_nummer_epreis=$_POST['anbieter_3'].$neueartnr;


mysqli_query($link," insert into $db_e_preis 
( 
laender_kennung,
kd_nr, 
kat_id,
bio_id,
art_nr, 
art_nr_short,
packungsgroesse, 
einheit,
preis
) 
values 
(
'$_COOKIE[laender_kennung]',
'$_POST[anbieter_3]',
'$postkategorie',
'$bio_kennzahl',
'$artikel_nummer_epreis',
'$neueartnr',
'$_POST[gramm_packung_3]',
'$_POST[einheit_3]',
'$_POST[artikel_preis_3]'
)
");
 }
    
} // ende while

    
} // ende if-Bedigung

} // ende IF 1



?>