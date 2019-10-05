<?php



$link=mysqli_connect("localhost","root","","as-bio") or die
      ("Keine Verbindung moeglich");

  
$zeit=date("Y-m-d H:i:s");

$datum=date("Y-m-d");

$time=time();

$monat=date("m");

$jahr=date("Y");

$db_adressen="as_adressen";
$db_anbieter="as_anbieter";
$db_artikel="as_artikel";
$db_artikel_nr="as_artikel_nr";
$db_e_preis="as_e_preis";
$db_kategorien="as_kategorien";
$db_kd_nr="as_kd_nr";
$db_packung_groesse="as_packung_groesse";
$db_tabellen_namen="as_tabellen_namen";
$db_verbraucher_nr="as_verbraucher_nr";
$db_warenkorb="as_warenkorb";
$db_warenkorb_historie="as_warenkorb_historie";
$db_kassenbons = "as_kassenbons";
$db_warenkorb_nr="as_warenkorb_nr";
$db_rueckfragen="as_rueckfragen";



/*$db_adressen="adressen";
$db_anbieter="anbieter";
$db_artikel="artikel";
$db_artikel_nr="artikel_nr";
$db_e_preis="e_preis";
$db_kategorien="kategorien";
$db_kd_nr="kd_nr";
$db_packung_groesse="packung_groesse";
$db_tabellen_namen="tabellen_namen";
$db_verbraucher_nr="verbraucher_nr";
$db_warenkorb="warenkorb";
$db_warenkorb_historie="warenkorb_historie";
$db_kassenbons = "kassenbons";
$db_warenkorb_nr="warenkorb_nr";
$db_rueckfragen="rueckfragen";
*/
  
$mwstb=7;
$mwst=19;

?>
