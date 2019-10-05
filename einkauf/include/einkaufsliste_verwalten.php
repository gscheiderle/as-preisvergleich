<?php
/////////////////////////////////////////////////////////////
//
//  Einkaufsliste verarbeiten
//  d.h.
//  Artikel vom Warenkorb loeschen 
//  oder
//  Artikel als "gekauft" markieren.
//  In dem Fall wird der Artikel fuer
//  statistische Zwecke im Warenkorb-Historie gespeichert
//
//  Als Vorlage bleibt der Artikel in der Tabelle
//  as_e_preis erhalten - mit Preis und Anbieter
//
//  Autor: Uwe Sack
//  im Juni 2019
//
////////////////////////////////////////////////////////////
?>



<?php 

// abfrage, ob Zwischenfrage vorm löschen abgeschaltet wird
$select_abfrage_1=mysqli_query($link, "select rueckfrage_1 from $db_rueckfragen where session = '$_COOKIE[session]' ");
while( $result_abfrage_1 = mysqli_fetch_array($select_abfrage_1, MYSQLI_BOTH ) ) {
	$no_rueckfrage_1 = $result_abfrage_1['rueckfrage_1'];
}
		
echo "<input type='hidden' name='artikel_gekauft' value='$_POST[artikel_gekauft]' >";


if ( $_POST['artikel_gekauft'] == TRUE ) { 
		
	
$gekauftbei=substr("$_POST[artikel_gekauft]",-4,4);

$geloescht=substr("$_POST[artikel_gekauft]",-9,5);

$epreisartnr=substr("$_POST[artikel_gekauft]",0,8);
	
$den_korb_id=substr("$_POST[artikel_gekauft]",8,5);	
	

$selectimkorb=mysqli_query($link, " select im_korb from $db_warenkorb where korb_id = '$den_korb_id' ");
while ( $resultimkorb = mysqli_fetch_array( $selectimkorb, MYSQLI_BOTH ) ) {
	$die_im_korb=$resultimkorb['im_korb'];
}	
	

if ( $die_im_korb == FALSE ) {
	
	
mysqli_query($link, " update $db_warenkorb set im_korb = '1' where korb_id = '$den_korb_id' ");	
	
$backgroundcolor="background-color: #C1E97B";
$fontcolor="color: #000";	
	
}	
	
if ( ( $die_im_korb == TRUE ) && ( $_POST['artikel_abschliessen'] == FALSE ) && ( $no_rueckfrage_1 == "" ) ) {	
	
echo $button_3="
<p><h3>Artikel abschlie&szlig;en und<br>
vom Einkaufszettel streichen?</h3><br>
<button name='artikel_abschliessen' value='artikelabschliessen' style=' height: 70px; width: 300px; font-size: 1.5rem; background-color: red; color: #FFF; font-weight: 700;'>Vorgang abschliessen</button></p>
<p><h4><input type='checkbox' name='rueckfrage_1' style='height:20px; width: 20px;'>&nbsp;Diese Frage nicht mehr zeigen.</h4></p><br><br>";
}	
	
if ( $_POST['rueckfrage_1'] == TRUE ) { mysqli_query($link, "insert into $db_rueckfragen (session, rueckfrage_1) values ( '$_COOKIE[session]', '$_POST[rueckfrage_1]' ) ");
									  }		
	


if  (
	
	( $_POST['artikel_abschliessen'] == "artikelabschliessen" ) || 
	
	( ( $die_im_korb == TRUE ) && ( $no_rueckfrage_1 == "on" ) ) 
	
	) {	

	

$select_gekauftbei=mysqli_query($link, "select an_bieter from $db_anbieter where kd_nr = '$gekauftbei' ");
	while ( $result_gekauftbei = mysqli_fetch_array($select_gekauftbei, MYSQLI_BOTH ) ) {
		$gekauft_bei = $result_gekauftbei['an_bieter'];
	}
    
			
$select_fuer_historie=mysqli_query($link, " select * from $db_warenkorb where korb_id = '$den_korb_id' ");
while ( $result_historie = mysqli_fetch_array( $select_fuer_historie, MYSQLI_BOTH ) ) {
    
$anbieter_id = $result_historie['anbieter_id'];   
$korb_id=$result_historie['korb_id'];
				
mysqli_query($link," insert into $db_warenkorb_historie
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
datum
)
values
(
'$den_korb_id',
'$result_historie[laender_kennung]',
'$result_historie[kaeufer_id]', 
'$gekauftbei',
'$gekauft_bei',
'$result_historie[kategorie]',
'$result_historie[bio_id]',
'$result_historie[art_nr]',
'$result_historie[artikel]',
'$result_historie[packung]',
'$result_historie[einheit]',
'$result_historie[preis]',
'$result_historie[preis_100_g]',
'$result_historie[datum]'
)
");

	
mysqli_query($link, "update $db_warenkorb set historie = '1' where korb_id = '$den_korb_id' ");
mysqli_query($link, "delete from $db_warenkorb where korb_id = '$den_korb_id' and historie = '1' and preis > '0' ");
					   	
}
}	
}

if ( $_POST['artikel_loeschen'] == TRUE ) {
    

$select_1=mysqli_query($link, " select korb_id, anbieter_id, art_nr, historie from $db_warenkorb where korb_id = '$_POST[artikel_loeschen]' and historie = '0' ");
while ( $result_1 = mysqli_fetch_array( $select_1, MYSQLI_BOTH ) ) { 
  
if ( $result_1['anbieter_id'] != '9999' ) { 
 mysqli_query($link," delete from $db_warenkorb where korb_id = '$_POST[artikel_loeschen]' ");
}

if ( ( $result_1['anbieter_id'] == '9999' ) && ( $result_1['historie'] == 0 ) ) { 
       
    $epreis_artnr='9999'.$result_1['art_nr'];
    
mysqli_query($link," delete from $db_warenkorb where korb_id = '$_POST[artikel_loeschen]' ");
mysqli_query($link," delete from $db_artikel where art_nr = '$result_1[art_nr]' ");
mysqli_query($link," delete from $db_artikel_nr where art_nr = '$result_1[art_nr]' ");
mysqli_query($link," delete from $db_e_preis where art_nr = '$epreis_artnr' ");
    
}
}
}


if ( $_POST['alle_artikel_loeschen'] == TRUE ) {
    

$select_2=mysqli_query($link, " select korb_id, anbieter_id, art_nr, historie from $db_warenkorb where laender_kennung = '$_COOKIE[laender_kennung]' and kaeufer_id = '$_COOKIE[verb_nr]' ");
while ( $result_2 = mysqli_fetch_array( $select_2, MYSQLI_BOTH ) ) {    
 
if ( ( $result_2['anbieter_id'] == '9999' ) && ( $result_2['historie'] == 1 ) ) {    
    mysqli_query($link," delete from $db_warenkorb where korb_id = '$result_2[korb_id]' ");
}    

$result_2['art_nr']=0;
	
if ( ( $result_2['anbieter_id'] == '9999' )  && ( $result_2['historie'] == 0 ) ) {      
    
    $epreisartnr='9999'.$result_2['art_nr'];
    
mysqli_query($link," delete from $db_artikel where art_nr = '$result_2[art_nr]' ");
mysqli_query($link," delete from $db_artikel_nr where art_nr = '$result_2[art_nr]' ");
mysqli_query($link," delete from $db_e_preis where art_nr = '$epreisartnr' and laender_kennung = '$_COOKIE[laender_kennung]' ");
mysqli_query($link," delete from $db_warenkorb where korb_id = '$result_2[korb_id]' ");
} 
                    
if ( $result_2['anbieter_id'] != '9999' ) {  
mysqli_query($link," delete from $db_warenkorb where korb_id = '$result_2[korb_id]' ");
}  
    
} // ende while
} // ende IF alle loeschen 



?>


