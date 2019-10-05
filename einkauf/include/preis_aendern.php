<?php


if ( $_POST['preis_eingabe_2'] == "preiseingabe_2" ) {
	


$bedingung_3=TRUE;
    
    
if ( substr($_POST['preiseingabe_2'], -3, -2) == "." || substr($_POST['preiseingabe_2'], -3, -2) == "," ) {
$_POST['preiseingabe_2']=substr_replace($_POST['preiseingabe_2'], '.', -3, 1);
}

else { $meldung_c="<h1>Preis bitte mit 2 Dezimalstellen (. oder ,) eingeben !</h1>";
       $bedingung_3=FALSE; 
     } 
    
    
	
	if ( $_POST['sieben'] == $mwstb ) { $_POST['preiseingabe_2']=($_POST['preiseingabe_2'] / 100) * (100+$mwstb); }
    if ( $_POST['neunzehn'] == $mwst ) { $_POST['preiseingabe_2']=($_POST['preiseingabe_2'] / 100) * (100+$mwst); }	
    
    
       $preis_100_g = ($_POST['preiseingabe_2'] / $_POST['gramm_packung_2'] );
    
    if ( trim($_POST['einheit_2']) == "g" || trim($_POST['einheit_2']) == "ml" ) {
         $preis_100_g= ( $_POST['preiseingabe_2']/$_POST['gramm_packung_2'] ) * 100;
    }
	
$select_eartikel=mysqli_query($link," select art_nr from $db_e_preis where art_nr = '$artikel_nummer_epreis' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $result_eartikel = mysqli_fetch_array( $select_eartikel , MYSQLI_BOTH )) {

if ( ( $result_eartikel['art_nr'] != "" ) && ( $bedingung_3 == TRUE ) ) {
    
$neue_e_preis_art_nr=$_POST['anbieter_preis_aendern'].$artikel_gekauft;
	
mysqli_query($link," update $db_e_preis set

packungsgroesse = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
hundert_g_preis = '$preis_100_g'

where art_nr = '$artikel_nummer_epreis' and laender_kennung = '$_COOKIE[laender_kennung]' ");
	
	
	
if ( substr("$_GET[artikel_gekauft]",-4,4) == 9999 ) { 
    

	
mysqli_query($link," update $db_e_preis set

kd_nr='$_POST[anbieter_preis_aendern]',
bio_id='$_POST[bio_code]',
art_nr='$neue_e_preis_art_nr',
art_nr_short= '$artikel_gekauft',
packungsgroesse = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
hundert_g_preis = '$preis_100_g'

where art_nr = '$artikel_nummer_epreis' and laender_kennung = '$_COOKIE[laender_kennung]'
 ");
	}

 
 $das_anbieter_select=mysqli_query($link, "select an_bieter from $db_anbieter where kd_nr = '$_POST[anbieter_preis_aendern]' ");
	while ( $das_anbieter_result = mysqli_fetch_array( $das_anbieter_select, MYSQLI_BOTH ) ) {
	$das_anbieter=$das_anbieter_result['an_bieter'];
	}
    
$artikel_nummer_warenkorb = substr("$artikel_nummer_epreis", -4,4 );
		
	
mysqli_query($link," update $db_warenkorb set
packung = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
preis_100_g = '$preis_100_g'

where korb_id = '$den_korb_id' ");  	
	
mysqli_query($link," update $db_warenkorb_historie set
packung = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
preis_100_g = '$preis_100_g'

where korb_id = '$den_korb_id' ");  	
	
	
if ( substr("$_GET[artikel_gekauft]",-4,4) == 9999 ) {
    
    
mysqli_query($link," update $db_warenkorb set
anbieter='$das_anbieter',
anbieter_id='$_POST[anbieter_preis_aendern]',
bio_id='$_POST[bio_code]',
packung = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
preis_100_g = '$preis_100_g'

where korb_id = '$den_korb_id' ");  
	
	
mysqli_query($link," update $db_warenkorb_historie set
anbieter='$das_anbieter',
anbieter_id='$_POST[anbieter_preis_aendern]',
bio_id='$_POST[bio_code]',
packung = '$_POST[gramm_packung_2]',
einheit = '$_POST[einheit_2]',
preis = '$_POST[preiseingabe_2]',
preis_100_g = '$preis_100_g'

where korb_id = '$den_korb_id' "); 	
	
	
mysqli_query($link," update $db_artikel set
bio_id = '$_POST[bio_code]' 
where art_nr = '$artikel_gekauft' ");	
	
	
}
    
    
} 
} 
}
?>