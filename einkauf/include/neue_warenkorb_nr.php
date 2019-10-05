<?php
//////////////////////////////////////////////////
//
//  Neue Warenkorb-Nr. erstellen
//
//  Author:
//  Uwe Sack
//
//  August 2019
//
/////////////////////////////////////////////////
?>

<?php

mysqli_query($link,"LOCK TABLES $db_warenkorb_nr write, $db_warenkorb_nr as $db_warenkorb_nr read");

$select_korb_3 = mysqli_query($link,"select max(korb_id) + 1 as korbid from $db_warenkorb_nr ");
while ($resultartnr=mysqli_fetch_array( $select_korb_3 , MYSQLI_BOTH )) {
$neue_korb_id=$resultartnr['korbid'];

mysqli_query($link," insert into $db_warenkorb_nr (korb_id) values ('$neue_korb_id') ");

mysqli_query($link,"UNLOCK TABLES");
    
 }  // ende while	

?>