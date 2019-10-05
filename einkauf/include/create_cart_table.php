<?php

/////////////////////////////////////////////////////////
//
//  CREATE CART-TABLE
//
//  AUTHOR: UWE SACK
//
////////////////////////////////////////////////////////
?>


<?php
$tabellen_name=str_replace("?","H",str_replace("&","6",str_replace(":","r",str_replace("\\","4",str_replace("/","3",str_replace("%","2",str_replace("$","1",session_id())))))));   
$temp_tab_name=substr($temp_tab_name,-18);
$temp_tab_name="as_".$tabellen_name."_1";


mysqli_query($link, "drop table if exists $temp_tab_name");


mysqli_query($link, "create TABLE IF NOT EXISTS $temp_tab_name
(
temp_id int(10) NOT NULL auto_increment primary key,
anbieter varchar(64),
artikel varchar(64),
bio int(2),
100_g_preis decimal(12,2),
preis decimal(12,2)
)
");

mysqli_query($link,"insert into $db_tabellen_namen
(
name_tabelle,
laufzeit
)
values
(
'$temp_tab_name',
'$time'
)
");



?>



