
<?php

$if_artikel="";
$zaehler=1;
$result_art_nr['art_nr']=0;

$select_art_nr=mysqli_query($link," select art_nr, artikel from $db_e_preis where laender_kennung = '$_COOKIE[laender_kennung]' and kd_nr != '9999' ");
while( $result_art_nr = mysqli_fetch_array( $select_art_nr, MYSQLI_BOTH ) ) {

$if_artikel.=$result_art_nr['art_nr'];
    
$artikel_nr_short[]=substr("$result_art_nr[art_nr]",-4,4);
$artikel_nr_long[]=$result_art_nr['art_nr'];

$artikel_in_e_preis[]=$result_art_nr['artikel'];    
}


if ( $if_artikel != "" ) {
    
    $artikel_nr_long_short=array_combine($artikel_nr_long,$artikel_nr_short);

	$an_bieter=0;
	
foreach ( $artikel_nr_long_short as $key => $value ) {
    
    $an_bieter=substr("$key",0,4);
   
 
$select_an_bieter=mysqli_query($link, "select an_bieter from $db_anbieter where kd_nr = '$an_bieter' limit 1 ");
$resultanbieter = mysqli_fetch_array( $select_an_bieter, MYSQLI_BOTH ) ;
    
$result_an_bieter = substr("$resultanbieter[an_bieter]", 0 , 3 );   

    
    
$select_artikel=mysqli_query($link," select bio_id, artikel from $db_artikel where art_nr = '$value' limit 1 ");
$result_artikel = mysqli_fetch_array( $select_artikel, MYSQLI_BOTH );
    
    $bio="";
    if ( $result_artikel['bio_id'] == 1 ) { $bio="BIO"; }

 $artikel_gespeichert[]="<option value='".$result_artikel['artikel']." ".$bio." ".$result_an_bieter." (".$key.")"."'>";

    
}
}

?>

    
