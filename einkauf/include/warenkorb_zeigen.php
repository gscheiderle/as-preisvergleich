

<?php 

if ( $_POST['alle_artikel_zeigen'] == "alleartikelzeigen" ) {
    
$zaehler_2_color=0;

$tag=date("d")-2;
$mintag=date("Y-m-$tag");
        
echo "<table>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


echo "<tr><td colspan='5'>";
echo "<b>Info: gleiche Korb-ID = gleicher Inhalt !</b><br>";
echo "</td></tr>";


$result_anbieter['anbieter_id']=0;
$result_anbieter['anbieter']="";	
	
$select_anbieter=mysqli_query($link," select distinct anbieter_id, anbieter from $db_warenkorb where kaeufer_id = '$_COOKIE[verb_nr]' and laender_kennung = '$_COOKIE[laender_kennung]' "); // and datum > '$mintag'
while ( $result_anbieter = mysqli_fetch_array( $select_anbieter , MYSQLI_BOTH )) {
$anbieter_id=$result_anbieter['anbieter_id'];
$anbieter=$result_anbieter['anbieter'];


$result_art_nr['anzahl_art_nr']=0;
$result_art_nr['summe_art_nr']=0;	
	
$select_art_nr=mysqli_query($link," select sum(art_nr) as summe_art_nr, count(art_nr) as anzahl_art_nr from $db_warenkorb where anbieter_id = '$anbieter_id' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $result_art_nr = mysqli_fetch_array($select_art_nr, MYSQLI_BOTH )) {
$anzahl_art_nr=$result_art_nr['anzahl_art_nr'];
$summe_art_nr=$result_art_nr['summe_art_nr'];
}

   
if ($zaehler_2_color % 2 == "" ) { $b_2_color="#cacaca";
								  }
	else { $b_2_color = "#dadada";
	  }
    

echo "<tr><td colspan='5' style= 'background-color: #a0a0a0;'>";
echo $anbieter."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Korb-ID: ".$anzahl_art_nr."/".$summe_art_nr;
echo "</b></td></tr>";

	
	$summen['realsumme']="";
	$summen['relativsumme']="";
$select_summen=mysqli_query($link," select sum(preis) as realsumme, sum(preis_100_g) as relativsumme 
                           from $db_warenkorb where kaeufer_id = '$_COOKIE[verb_nr]' and anbieter_id = '$anbieter_id' and laender_kennung = '$_COOKIE[laender_kennung]'  "); // and datum > '$mintag'
while ( $summen = mysqli_fetch_array( $select_summen ) )  {
$real_summe="&nbsp;".$summen['realsumme']."&nbsp;";
$relativ_summe="&nbsp;".$summen['relativsumme']."&nbsp;";
    
    
}

$ware['einheit']="";
$ware['preis']="";
$ware['preis_100_g']="";
$ware['Packung']="";
	
$select_ware=mysqli_query($link," select bio_id, artikel, packung, einheit, preis, preis_100_g 
                           from $db_warenkorb where kaeufer_id = '$_COOKIE[verb_nr]' and anbieter_id = '$anbieter_id' and datum > '$mintag' "); 
while ( $ware = mysqli_fetch_array( $select_ware ) )  {
$einheit_db=$ware['einheit'];	


echo "<tr>";
echo "<td colspan='2' align='left' style= 'background-color: $b_2_color;'></td>"; 
echo "<td colspan='1' align='right' style= 'background-color: $b_2_color;'>Preis</td>";                             
echo "<td colspan='2' align='right' style= 'background-color: $b_2_color;'>100-$einheit_db-Preis</td>"; 
echo "</tr>";


	
if ( $ware['bio_id'] == 1 ) { $bio = "<font style='color: green; font-size: 36px;'>&nbsp;BIO</font>"; }
                       else { $bio = ""; }
    
echo "<tr>";
echo "<td colspan='5' align='left' style=' background-color: $b_2_color;'>".$ware['artikel'].$bio."</td>"; 
echo "</tr>";
echo "<tr>";  
echo "<td colspan='1' align='left' style=' background-color: $b_2_color;'>".$ware['packung']."</td>";
echo "<td colspan='1' align='left' style=' background-color: $b_2_color;'>".$ware['einheit']."</td>";
echo "<td colspan='1' align='right' style=' background-color: $b_2_color;'>".$ware['preis']."</td>";                             
echo "<td colspan='2' align='right' style=' background-color: $b_2_color;'>".$ware['preis_100_g']."</td>"; 
echo "</tr>";  
echo "<tr>";
echo "<td colspan='5' height='5px' align='right' style=' background-color: grey;'></td>"; 
echo "</tr>";
    
    
    

}
    
    
echo "<tr>";
echo "<td colspan='3' align='right' style=' background-color: $b_2_color;'>Summe an der Kasse&nbsp;</td>";
echo "<td colspan='2' align='right' style=' background-color: $b_2_color;'><h1>".$real_summe."</h1></td>";
echo "</tr>";

echo "<tr>";
echo "<td colspan='3' align='right' style=' background-color: $b_2_color;'>Summe relativ zu 100&nbsp;</td>";
echo "<td colspan='2' align='right' style=' background-color: $b_2_color;'><h2>".$relativ_summe."</h2></td>";
echo "</tr>";
    
echo "<tr>";
echo "<td colspan='5' height='10px' align='right' style=' background-color: red;'></td>";
echo "</tr>";


$summe_art_nr="";
  
$zaehler_2_color++; 

    
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

echo "</table>";

}
?>