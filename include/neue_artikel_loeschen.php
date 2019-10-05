<?php
/////////////////////////////////////////////////
//
//  Gekaufte, nicht angelegte Artikel
//  final löschen
//
//  Author: Uwe Sack
//  Juli 2019
//
///////////////////////////////////////////////
?>



<?php
if ( $_POST['neuen_artikel_loeschen_3'] == "neuenartikelloeschen_3" ) {
    
    
        $artikel_nr_loeschen=substr("$_POST[neue_artikel_3]", -5, 4);
        $artikel_epreis_loeschen=substr("$_POST[neue_artikel_3]", -9, 8);
	


mysqli_query($link," delete from $db_artikel where art_nr = '$artikel_nr_loeschen' ");
mysqli_query($link," delete from $db_artikel_nr where art_nr = '$artikel_nr_loeschen' ");
mysqli_query($link," delete from $db_e_preis where art_nr = '$artikel_epreis_loeschen' ");
    

}
?>