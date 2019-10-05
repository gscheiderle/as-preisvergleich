
<?php


$select_art_nr=mysqli_query($link," select preis_id, art_nr, artikel from $db_e_preis where laender_kennung = '$_COOKIE[laender_kennung]' and kd_nr = '9999' ");
while( $result_art_nr = mysqli_fetch_array( $select_art_nr, MYSQLI_BOTH ) ) {
    
$artikel_preis_id[]=$result_art_nr['preis_id'];
$artikel_artnr[]=substr("$result_art_nr[art_nr]",-4,4);
    
$artikel_e_preis[]=$result_art_nr['artikel'];
    
    
$artikel_artikelnr[]="<option value='".$result_art_nr['artikel']." (".$result_art_nr['art_nr'].")"."'>"."</option>";
 
    
    $update_artikel_vorhanden=$result_art_nr['preis_id'];
    
}


if ( $update_artikel_vorhanden != "" ) {

$artikel_nr_preis_id=array_combine($artikel_preis_id,$artikel_artnr);
$artikel_nr_preis_id=array_unique($artikel_nr_preis_id);

}

?>

    
