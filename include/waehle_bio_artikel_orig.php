<?php

$select_e_artikel_bio=mysqli_query($link," select distinct art_nr from $db_e_preis where bio_id = '1' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $result_e_artikel_bio = mysqli_fetch_array( $select_e_artikel_bio, MYSQLI_BOTH )) {
$gekuerzt_bio[]=substr("$result_e_artikel_bio[art_nr]",4,4);
}
$artikel_nummern_bio=array_unique($gekuerzt_bio);

foreach ( $artikel_nummern_bio as $artnr_bio ) { 

$select_bio_artikel=mysqli_query($link," select art_nr, artikel from $db_artikel where art_nr = '$artnr_bio' "); 
while ( $result_bio_artikel = mysqli_fetch_array( $select_bio_artikel , MYSQLI_BOTH )) {


if ( $result_bio_artikel['art_nr'] == $_POST['artikel_preise_bio'] )  { $select_bio_11="selected"; }
if ( $result_bio_artikel['art_nr'] == $_POST['artikel'] )  { $select_bio_22="selected"; }
if ( $result_bio_artikel['art_nr'] == $_POST['artikel_bio_3'] )  { $select_bio_33="selected"; }

$artikel_option_bio_1.="<option $select_bio_11 value='$result_bio_artikel[art_nr]'>".$result_bio_artikel['artikel']."</option>";
$artikel_option_bio_2.="<option $select_bio_22 value='$result_bio_artikel[art_nr]'>".$result_bio_artikel['artikel']."</option>";
$artikel_option_bio_3.="<option $select_bio_33 value='$result_bio_artikel[art_nr]'>".$result_bio_artikel['artikel']."</option>";

$select_bio_11="";
$select_bio_22="";
$select_bio_33="";
}
}
?>