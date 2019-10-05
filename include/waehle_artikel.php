<?php


$select_e_artikel=mysqli_query($link," select distinct art_nr from $db_e_preis where bio_id = '0' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $result_e_artikel = mysqli_fetch_array( $select_e_artikel, MYSQLI_BOTH ) ) {
$gekuerzt[]=substr("$result_e_artikel[art_nr]",4,4);
}
$artikel_nummern=array_unique($gekuerzt);

foreach ( $artikel_nummern as $artnr ) {

$select_artikel=mysqli_query($link," select distinct art_nr, artikel from $db_artikel where art_nr = '$artnr' "); 
while ( $result_artikel = mysqli_fetch_array( $select_artikel , MYSQLI_BOTH )) {

$select_11="";
$select_22="";
$select_33="";

if ( $result_artikel['art_nr'] == $_POST['artikel_preise'] )  { $select_11="selected"; }
if ( $result_artikel['art_nr'] == $_POST['artikel'] )  { $select_22="selected"; }
if ( $result_artikel['art_nr'] == $_POST['artikel_3'] )  { $select_33="selected"; }

$artikel_option_1.="<option $select_11 value='$result_artikel[art_nr]'>".$result_artikel['artikel']."</option>";
$artikel_option_2.="<option $select_22 value='$result_artikel[art_nr]'>".$result_artikel['artikel']."</option>";
$artikel_option_3.="<option $select_33 value='$result_artikel[art_nr]'>".$result_artikel['artikel']."</option>";

$select_11="";
$select_22="";
$select_33="";
}
}
?>

