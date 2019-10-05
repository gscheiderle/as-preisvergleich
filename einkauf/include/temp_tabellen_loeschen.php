<?php
///////////////////////////////////////////////////////////
//
//  TEMPORAERE TABELLEN LOESCHEN
//
//  AUTHOR: UWE SACK
//  JUNI 2019
//
//////////////////////////////////////////////////////////
?>

<?php
$select_laufzeit=mysqli_query($link, "select tab_name_id, name_tabelle, laufzeit from $db_tabellen_namen ");
while ( $result_laufzeit = mysqli_fetch_array($select_laufzeit, MYSQLI_BOTH ) ) {
    
    if ( ( $result_laufzeit['laufzeit'] + 120 ) < time() ) {
        
        mysqli_query($link, "drop table $result_laufzeit[name_tabelle] ");
    
        
        mysqli_query($link, "delete from tabellen_namen where tab_name_id = '$result_laufzeit[tab_name_id]' ");
    }
}
