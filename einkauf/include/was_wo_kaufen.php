

<?php 

if (( $_POST['warenkorb_zeigen'] == "warenkorbzeigen" ) || ( $_GET['einkaufs_vorschlag'] == "zeigen" ) )  {

$zaehler_color=1;
    

echo "<table style='width: 320px;'>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 


$tag=date("d")-7;
$mintag=date("Y-m-$tag");

$select_art_nr=mysqli_query($link," select distinct art_nr from $db_warenkorb where kaeufer_id = '$_COOKIE[verb_nr]' and laender_kennung = '$_COOKIE[laender_kennung]' and historie = '0' "); // and datum > '$mintag'
while ( $result_art_nr = mysqli_fetch_array($select_art_nr, MYSQLI_BOTH )) { // while 1
$artikel_nummer=$result_art_nr['art_nr']; 


	
$select_minpreis=mysqli_query($link, "select preis_id, packungsgroesse, einheit, preis, hundert_g_preis from $db_e_preis where art_nr like '%$artikel_nummer' order by hundert_g_preis limit 1 ");

    while ( $result_min_preis = mysqli_fetch_array($select_minpreis, MYSQLI_BOTH ) ) { // while 2

        
$selectanbieter=mysqli_query($link," select kd_nr, bio_id, artikel, preis from $db_e_preis where preis_id = '$result_min_preis[preis_id]' order by kd_nr ");
while ( $resultanbieter = mysqli_fetch_array($selectanbieter , MYSQLI_BOTH )) { // while 3

 $selectanbieter=mysqli_query($link,"select an_bieter from $db_anbieter where kd_nr = '$resultanbieter[kd_nr]' ");
    while( $anbieter_result = mysqli_fetch_array( $selectanbieter, MYSQLI_BOTH ) ) { // while 4
        $die_anbieter=$anbieter_result['an_bieter'];
    } // ende while 4

$bio_kennzahl_db=$resultanbieter['bio_id'];
$die_artikel=$resultanbieter['artikel'];
$der_100_g_preis=$result_min_preis['hundert_g_preis'];
$der_preis=$resultanbieter['preis'];

// } // ende while 3
       
     
mysqli_query($link, "insert into $temp_tab_name 
(
anbieter,
artikel,
bio,
100_g_preis,
preis
)
values
(
'$die_anbieter',
'$die_artikel',
'$bio_kennzahl_db',
'$der_100_g_preis',
'$der_preis'
)
");
    }
    }

} // ende while 2

$die_anbieter="";
$die_anbieter_id="";
    
$zaehler_color++;
    
  
      
$anbieter_zeile=array();
$warenkorb=array();    
    
    
$create_cart=mysqli_query($link, "select distinct anbieter from $temp_tab_name order by anbieter ");
    while( $resultcart = mysqli_fetch_array( $create_cart, MYSQLI_BOTH ) ) {   // while 5   
       
$anbieter_zeile[]=$resultcart['anbieter'];

} // ende while 5
    
    
    
foreach( $anbieter_zeile as $anbieter ) {
        
$createcart=mysqli_query($link, "select * from $temp_tab_name where anbieter = '$anbieter' order by anbieter ");
    while( $result_cart = mysqli_fetch_array( $createcart, MYSQLI_BOTH ) ) {  
        
        
            
        $bio = ""; 
               if ( $result_cart['bio'] == 1 ) { $bio = "<font style='color: green; font-size: 1.5rem;'>&nbsp;BIO</font>"; }
          
    
        
$warenkorb[]="
<tr>
<td align='center' colspan='3' style=' background-color: #FADE8B ;'>".$anbieter."</td>
</tr>

<tr>
<td align='left' style=' background-color: $b_color;'>".$result_cart['artikel']." ".$bio."</td>
<td align='right' style=' background-color: #F3F3F3;'>".$result_cart['100_g_preis']."</td>
<td align='right' style=' background-color: lightgreen;'>".$result_cart['preis']."</td>
</tr>"; 
        
$summe_100=$summe_100+$result_cart['100_g_preis'];		
$summe=$summe+$result_cart['preis'];       

        
$anbieter="";        
 }
}

echo "<tr>
<td colspan='2' align='right' style=' background-color: #F3F3F3 ;'>Einzelpreis<br>100g oder 100ml</td>
<td align='right' valign='bottom' style=' background-color: lightgreen;'>Pckg.

</td>
</tr>
<tr><td colspan='3'><hr></td></tr>";
    
    
    foreach( $warenkorb as $waren_korb ) {
    echo $waren_korb;
        
    }    
    

echo "<tr>";
echo "<td  align='right' style=' background-color: ;'><hr><hr>Summen:&nbsp;</td>"; 
	echo "<td  align='right' style=' background-color: ;'><hr><hr>$summe_100</td>"; 
	echo "<td  align='right' style=' background-color: ;'><hr><hr>$summe</td>"; 
echo "</tr>"; 
       
  
echo "<tr>";
echo "<td colspan='3' height='10px' align='right' style=' background-color: red;'> </td>";
echo "</tr>";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "</table>";

// alte Eintr&auml;ge vom warenkorb l&ouml;schen
// mysqli_query($link," delete from $db_warenkorb where datum < '$mintag' ");

}
?>