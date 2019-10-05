
<?php

if ( ( $_POST['preis_eingabe_3'] == "preiseingabe_3" ) && ( $_POST['artikel_3'] != "" ) ) { // IF 1
    
    
$bedingung_3=TRUE;    
    
if ( substr($_POST['artikel_preis_3'], -3, -2) == "." || substr($_POST['artikel_preis_3'], -3, -2) == "," ) {
$_POST['artikel_preis_3']=substr_replace($_POST['artikel_preis_3'], '.', -3, 1);
}

else { $meldung_c="<h1>Preis bitte mit 2 Dezimalstellen (. oder ,) eingeben !</h1>";
       $bedingung_3=FALSE; 
     }
    
    

    $gesuchte_artikel_nr=substr("$_POST[artikel_3]",-5,4);
    $gesuchter_artikel=$_POST['artikel_3'];
    $gesuchter_artikel=htmlentities("$gesuchter_artikel");
    
if ( in_array("$gesuchter_artikel",$artikel_in_e_preis ) )  {
    
    
    $select_art_nr_von_artikel=mysqli_query($link, " select art_nr from $db_artikel where artikel like '$gesuchter_artikel%' ");
    while ( $result_art_nr_von_artikel = mysqli_fetch_array( $select_art_nr_von_artikel, MYSQLI_BOTH ) ) {
    $neueartnr= $result_art_nr_von_artikel['art_nr'];
    }
	

	
$neue_artikel_3=$_POST['artikel_3'];  
$neue_artikel_3=htmlentities($neue_artikel_3); 
    
    
$anbieter_nr=9999;
$artikel_nummer_epreis=$anbieter_nr.$neueartnr;


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
einheit
) 
values 
(
'$_COOKIE[laender_kennung]',
'$anbieter_nr',
'$postkategorie',
'$bio_kennzahl',
'$artikel_nummer_epreis',
'$neueartnr',
'$neue_artikel_3',
'$_POST[gramm_packung_3]',
'$_POST[einheit_3]'
)
");
  
if ( $_POST['artikel_3'] != "" ) { 
$anbieter_nr=9999;
$anbieter="NN";
	
	
mysqli_query($link,"LOCK TABLES $db_warenkorb_nr write, $db_warenkorb_nr as $db_warenkorb_nr read");

$select_korb_3 = mysqli_query($link,"select max(korb_id) + 1 as korbid from $db_warenkorb_nr ");
while ($resultartnr=mysqli_fetch_array( $select_korb_3 , MYSQLI_BOTH )) {
$neue_korb_id=$resultartnr['korbid'];

mysqli_query($link," insert into $db_warenkorb_nr (korb_id) values ('$neue_korb_id') ");

mysqli_query($link,"UNLOCK TABLES");
    
 }  // ende while	
    
mysqli_query($link," insert into $db_warenkorb
(
korb_id,
laender_kennung,
kaeufer_id,
anbieter_id,
anbieter,
bio_id,
art_nr,
artikel,
datum
)
values
(
'$neue_korb_id',
'$_COOKIE[laender_kennung]',
'$_COOKIE[verb_nr]',
'$anbieter_nr',
'$anbieter',
'$bio_kennzahl_db',
'$neueartnr',
'$neue_artikel_3',
'$datum'
)
");   

}
	
    
    $bedingung_1 = TRUE;
}    
    
    
    
if ( ( !in_array("$gesuchte_artikel_nr",$artikel_nr_short) ) && 
     ( !in_array("$gesuchter_artikel",$artikel_in_e_preis) )   ) { // IF 1a
 
$bedingung_1 = TRUE;


mysqli_query($link,"LOCK TABLES $db_artikel_nr write, $db_artikel_nr as $db_artikel_nr read");

$select_artnr_3 = mysqli_query($link,"select max(art_nr) + 1 as artnr from $db_artikel_nr ");
while ($resultartnr=mysqli_fetch_array( $select_artnr_3 , MYSQLI_BOTH )) {
$neueartnr=$resultartnr['artnr'];

mysqli_query($link," insert into $db_artikel_nr (art_nr) values ('$neueartnr') ");

mysqli_query($link,"UNLOCK TABLES");
    
 }  // ende while

 
    
$neue_artikel_3=$_POST['artikel_3'];  
$neue_artikel_3=htmlentities($neue_artikel_3); 
    

mysqli_query($link," insert into $db_artikel ( 
kat_id, 
bio_id, 
art_nr, 
artikel
) 
values 
( 
'$postkategorie',
'$bio_kennzahl',
'$neueartnr',
'$neue_artikel_3'
) 
");

    
$anbieter_nr=9999;
$artikel_nummer_epreis=$anbieter_nr.$neueartnr;


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
einheit
) 
values 
(
'$_COOKIE[laender_kennung]',
'$anbieter_nr',
'$postkategorie',
'$bio_kennzahl',
'$artikel_nummer_epreis',
'$neueartnr',
'$neue_artikel_3',
'$_POST[gramm_packung_3]',
'$_POST[einheit_3]'
)
");
	
	
	
if ( $_POST['artikel_3'] != "" ) { 
	

mysqli_query($link,"LOCK TABLES $db_warenkorb_nr write, $db_warenkorb_nr as $db_warenkorb_nr read");

$select_korb_3 = mysqli_query($link,"select max(korb_id) + 1 as korbid from $db_warenkorb_nr ");
while ($resultartnr=mysqli_fetch_array( $select_korb_3 , MYSQLI_BOTH )) {
$neue_korb_id=$resultartnr['korbid'];

mysqli_query($link," insert into $db_warenkorb_nr (korb_id) values ('$neue_korb_id') ");

mysqli_query($link,"UNLOCK TABLES");
    
 }  // ende while	
  

$anbieter_nr=9999;
$anbieter="NEU";
    
mysqli_query($link," insert into $db_warenkorb
(
korb_id,
laender_kennung,
kaeufer_id,
anbieter_id,
anbieter,
bio_id,
art_nr,
artikel,
datum
)
values
(
'$neue_korb_id',
'$_COOKIE[laender_kennung]',
'$_COOKIE[verb_nr]',
'$anbieter_nr',
'$anbieter',
'$bio_kennzahl_db',
'$neueartnr',
'$neue_artikel_3',
'$datum'
)
");   

}
	
	}  // ende IF ! in array

} // IF 1


?>