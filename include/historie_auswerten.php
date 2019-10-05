

<?php 



if ( $_POST['ausgaben_abfragen'] == "ausgabenabfragen" ) {

$zaehler_color=1;
    

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
    $select_summe=mysqli_query($link," select sum(preis) as sum_me from $db_warenkorb_historie ");
while ( $result_summe = mysqli_fetch_array($select_summe, MYSQLI_BOTH )) { // while 2

    $gesamt_summe=$gesamt_summe+$result_summe['sum_me'];
    
    
} // ende while 1    
    


$select_anbieter=mysqli_query($link," select distinct anbieter from $db_warenkorb_historie where laender_kennung = '$_COOKIE[laender_kennung]' "); // and datum > '$mintag'
while ( $result_anbieter = mysqli_fetch_array($select_anbieter, MYSQLI_BOTH )) { // while 2
$anbieter=$result_anbieter['anbieter']; 


        
$selectsumme=mysqli_query($link," select sum(preis) as sum_me from $db_warenkorb_historie where anbieter = '$anbieter' ");
while ( $resultsumme = mysqli_fetch_array($selectsumme, MYSQLI_BOTH )) { // while 3
    
$prozentsumme = 100/$gesamt_summe*$resultsumme['sum_me'];
    
 $b_color="";
    
    if ( $zaehler_color % 2 != "" ) { $b_color = "#FFF"; }
    
$warenkorb[]="<tr>
    <td align='left' style=' background-color: $b_color;'><h2>".$anbieter."</td>
    <td align='right' style=' background-color: $b_color;'><h2>".$resultsumme['sum_me']."</td>
    <td align='right' style=' background-color: $b_color;'><h2>". number_format($prozentsumme, 1, ",", "." ) ."</td>
</tr>";
    
$prozent_summe=$prozent_summe+$prozentsumme;   
    
$zaehler_color++;    
    
} // ende while 3
} // ende while 2
    
   
    


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


}

?>