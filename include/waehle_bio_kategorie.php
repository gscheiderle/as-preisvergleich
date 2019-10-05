
<?php


$select_bio_kategorie=mysqli_query($link," select * from $db_kategorien where bio_id = 1 ");
while ($result_bio_kategorie=mysqli_fetch_array($select_bio_kategorie, MYSQLI_BOTH )) {

if ( $result_bio_kategorie['kat_id'] == $_POST['kategorie_bio_1'] )  { $select_bio_c_1="selected"; }
if ( $result_bio_kategorie['kat_id'] == $_POST['kategorie_bio_2'] )  { $select_bio_c_2="selected"; }
if ( $result_bio_kategorie['kat_id'] == $_POST['kategorie_bio_3'] )  { $select_bio_c_3="selected"; }

$kategorie_bio_option_1.="<option $select_bio_c_1 value='$result_bio_kategorie[kat_id]'>".$result_bio_kategorie['kategorie']."</option>";
$kategorie_bio_option_2.="<option $select_bio_c_2 value='$result_bio_kategorie[kat_id]'>".$result_bio_kategorie['kategorie']."</option>";
$kategorie_bio_option_3.="<option $select_bio_c_3 value='$result_bio_kategorie[kat_id]'>".$result_bio_kategorie['kategorie']."</option>";

$select_bio_c_1="";
$select_bio_c_2="";
$select_bio_c_3="";

}
?>
