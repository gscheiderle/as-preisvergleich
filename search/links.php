<?php


$nadel =
array(
"&auml;",
"&Auml;",
"&ouml;",
"&Ouml;",
"&uuml;",
"&Uuml;",
"&euro;",
"&szlig;"
);

$ersatz =
array(
"ae",
"Ae",
"oe",
"Oe",
"ue",
"Ue",
"Euro",
"ss"
);


$result_artikel_data.="<?xml version='1.0' encoding='utf-8' ?>";

$result_artikel_data.="\n"; 
$result_artikel_data.="<pages>";
$result_artikel_data.="\n"; 

$select_artikel_data=mysqli_query($link, "select kd_nr, art_nr_short, artikel from $db_e_preis " );
while ( $resultartikeldata = mysqli_fetch_array( $select_artikel_data, MYSQLI_BOTH ) ) {
    
    
$selectanbieter=mysqli_query($link, " select an_bieter from $db_anbieter where kd_nr = '$resultartikeldata[kd_nr]' " );
    while ( $resultanbieter = mysqli_fetch_array($selectanbieter, MYSQLI_BOTH ) ) {
    $result_anbieter = $resultanbieter['an_bieter'];
 }
   
$clean_artikel=str_replace($nadel,$ersatz,$resultartikeldata['artikel']);    
    
$result_artikel_data.="<button>";

$result_artikel_data.="\n";    
      
$result_artikel_data.="<name>";
$result_artikel_data.=$resultartikeldata['art_nr_short'];
$result_artikel_data.="</name>";
    
$result_artikel_data.="\n";    
      
$result_artikel_data.="<value>";
$result_artikel_data.="$clean_artikel";
$result_artikel_data.="</value>";
    
$result_artikel_data.="\n";    
      
$result_artikel_data.="<width>";
$result_artikel_data.="$result_anbieter";
$result_artikel_data.="</width>";    
    
$result_artikel_data.="\n";    
    
$result_artikel_data.="</button>";
    
$result_artikel_data.="\n";
$result_artikel_data.="\n";

}

$result_artikel_data.="</pages>";



file_put_contents("links.xml", $result_artikel_data);



?>
    
    
