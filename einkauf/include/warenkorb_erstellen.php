

<?php 


if ( ( $_POST['artikel_speichern'] == "artikelspeichern" ) && ( $_POST['artikel_3'] != "" ) ) {
    
    $artikelnr_long=substr("$_POST[artikel_3]",-9,8);
    $artikelnr_short=substr("$_POST[artikel_3]",-5,4);
	$gesuchterartikel=htmlentities("$_POST[artikel_3]");

    
if  ( ( in_array( "$artikelnr_short", $artikel_nr_long_short ) ) || 
      ( in_array( "$gesuchterartikel",$artikel_in_e_preis ) )
	) { // IF 1a     
    
$bedingung_4=TRUE;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
/*if ( ( $_POST['artikel_3'] != 10000 ) && ( $_POST['artikel_bio_3'] != 10000 ) ) {
    
    $bedingung_4=FALSE;
    $doppel_hinweis="<h3><font style='color: #FFFFFF; background-color: red;'>Nur EINE Sorte Artikel w&auml;hlen !</font><br>";
}
    
if ( ( $_POST['artikel_3'] == 10000 ) && ( $_POST['artikel_bio_3'] == 10000 ) ) {
    
    $bedingung_4=FALSE;
    $doppel_hinweis="<h3><font style='color: #FFFFFF; background-color: red;'>Einen Artikel w&auml;hlen !</font><br>";
}
    

if ( $_POST['artikel_3'] != 10000 ) {$bio_kennzahl = 0; 
                                       $postartikel = $_POST['artikel_3']; }
                                       
if ( $_POST['artikel_bio_3'] != 10000 ) {$bio_kennzahl = 1; 
                                       $postartikel = $_POST['artikel_bio_3']; }     
                                 
*/
	

	
	
	
$whereklausel=" where art_nr = '$artikelnr_long' ";	
	

if ( in_array( "$gesuchterartikel",$artikel_in_e_preis ) ) {	
	
	$whereklausel=" where artikel like '$gesuchterartikel%' limit 1";	
}

$select_kdnr=mysqli_query($link," select kd_nr, packungsgroesse, einheit, preis, hundert_g_preis from $db_e_preis $whereklausel ");
while ( $result_kdnr=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH )) {
$anbieter_nr=$result_kdnr['kd_nr'];
$packungsgroesse=$result_kdnr['packungsgroesse'];
$packungseinheit=$result_kdnr['einheit'];
$packungspreis=$result_kdnr['preis'];
$hundert_gramm_preis=$result_kdnr['hundert_g_preis'];



$select_artikel=mysqli_query($link," select kat_id, bio_id, art_nr, artikel as ar_tikel from $db_artikel where art_nr = '$artikelnr_short' ");
while ( $result_artikel = mysqli_fetch_array( $select_artikel , MYSQLI_BOTH )) {
$kat_id=$result_artikel['kat_id'];
$bio_kennzahl_db=$result_artikel['bio_id'];
$art_nr=$result_artikel['art_nr'];
$artikel=$result_artikel['ar_tikel'];
}


$select_kd_name=mysqli_query($link," select an_bieter from $db_anbieter where kd_nr = '$anbieter_nr' ");
while ( $result_kdname = mysqli_fetch_array($select_kd_name, MYSQLI_BOTH )) {
$anbieter=$result_kdname['an_bieter'];
}
}

	
if ( $artikel != "" ) { 	
	
	
mysqli_query($link,"LOCK TABLES $db_warenkorb_nr write, $db_warenkorb_nr as $db_warenkorb_nr read");

$select_korb_3 = mysqli_query($link,"select max(korb_id) + 1 as korbid from $db_warenkorb_nr ");
while ($resultartnr=mysqli_fetch_array( $select_korb_3 , MYSQLI_BOTH )) {
$neue_korb_id=$resultartnr['korbid'];

mysqli_query($link," insert into $db_warenkorb_nr (korb_id) values ('$neue_korb_id') ");

mysqli_query($link,"UNLOCK TABLES");
    
 }  // ende while	
	
	
	
$historie=0;

mysqli_query($link," insert into $db_warenkorb
(
korb_id,
laender_kennung,
kaeufer_id,
anbieter_id,
anbieter,
kategorie,
bio_id,
art_nr,
artikel,
packung,
einheit,
preis,
preis_100_g,
datum,
historie
)
values
(
'$neue_korb_id',
'$_COOKIE[laender_kennung]',
'$_COOKIE[verb_nr]', 
'$anbieter_nr',
'$anbieter',
'$kat_id',
'$bio_kennzahl_db',
'$art_nr',
'$artikel',
'$packungsgroesse',
'$packungseinheit',
'$packungspreis',
'$hundert_gramm_preis',
'$datum',
'$historie'
)
");

}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
}
?>