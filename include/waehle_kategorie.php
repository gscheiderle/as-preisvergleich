
<?php


$select_kategorie=mysqli_query($link," select * from $db_kategorien where bio_id = '0' ");
while ($result_kategorie=mysqli_fetch_array($select_kategorie, MYSQLI_BOTH )) {

if ( $result_kategorie['kat_id'] == $_POST['kategorie_1'] )  { $select_c_1="selected"; }
if ( $result_kategorie['kat_id'] == $_POST['kategorie_2'] )  { $select_c_2="selected"; }
if ( $result_kategorie['kat_id'] == $_POST['kategorie_3'] )  { $select_c_3="selected"; }

$kategorie_option_1.="<option $select_c_1 value='$result_kategorie[kat_id]'>".$result_kategorie['kategorie']."</option>";
$kategorie_option_2.="<option $select_c_2 value='$result_kategorie[kat_id]'>".$result_kategorie['kategorie']."</option>";
$kategorie_option_3.="<option $select_c_3 value='$result_kategorie[kat_id]'>".$result_kategorie['kategorie']."</option>";

$select_c_1="";
$select_c_2="";
$select_c_3="";

}
?>
