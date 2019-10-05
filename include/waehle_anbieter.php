<?php


$select_anbieter=mysqli_query($link," select kd_nr, an_bieter from $db_anbieter");
while ($result_anbieter=mysqli_fetch_array($select_anbieter, MYSQLI_BOTH )) {


if ( $result_anbieter['kd_nr'] == $_POST['anbieter_preis_abfrage'])  { $select_1="selected"; }
if ( $result_anbieter['kd_nr'] == $_POST['anbieter_preis_aendern'] || $result_anbieter['kd_nr'] == $gekauftbei )  { $select_2="selected"; }
if ( $result_anbieter['kd_nr'] == $_POST['anbieter_3'] )  { $select_3="selected"; }

$anbieter_option_1.="<option $select_1 value='$result_anbieter[kd_nr]'>".$result_anbieter['an_bieter']."</option>";
$anbieter_option_2.="<option $select_2 value='$result_anbieter[kd_nr]'>".$result_anbieter['an_bieter']."</option>";
$anbieter_option_3.="<option $select_3 value='$result_anbieter[kd_nr]'>".$result_anbieter['an_bieter']."</option>";

$select_1="";
$select_2="";
$select_3="";


$zaehler_1++;

}
?>

