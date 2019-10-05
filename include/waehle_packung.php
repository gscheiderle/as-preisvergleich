
<?php


$select_packung=mysqli_query($link," select * from $db_packung_groesse ");
while ($result_packung=mysqli_fetch_array($select_packung, MYSQLI_BOTH )) {



if ( $result_packung['pack_id'] == $_POST['gramm_packung_1'] )  { $select_b_1="selected"; }
/*if ( $result_packung['pack_id'] == $_POST['gramm_packung_2'] )  { $select_b_2="selected"; }*/
if ( $result_packung['pack_id'] == $_POST['gramm_packung_3'] )  { $select_b_3="selected"; }

$packung_option_1.="<option $select_b_1 value='$result_packung[pack_id]'>".$result_packung['packungsgroesse']."</option>";
// $packung_option_2.="<option $select_b_2 value='$result_packung[pack_id]'>".$result_packung['packungsgroesse']."</option>";
$packung_option_3[]="<option $select_b_3 value='$result_packung[pack_id]'>".$result_packung['packungsgroesse']."</option>";
   $packung_option_2[]="<option value='".$result_packung['packungsgroesse']."'>";    
   // $packung_option_3[]="<option value='".$result_packung['packungsgroesse']."'>";

$select_b_1="";
$select_b_2="";
$select_b_3="";


}
?>
