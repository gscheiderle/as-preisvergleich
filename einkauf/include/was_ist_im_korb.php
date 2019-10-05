



<?php 


if ( 
	$_POST['waren_korb'] == "warenkorb" || $_GET['artikel_loeschen'] != "" || $_GET['artikel_gekauft'] != "" || $_GET['einkaufszettel_zeigen'] == "oeffnen" ||  
	$_POST['artikel_speichern'] == "artikelspeichern"  || 
    $_POST['artikel_loeschen'] == TRUE  ||  $_POST['artikel_gekauft'] == TRUE
   ) {

$zaehler_color=1;
	

    
echo "<table style=' width: auto; '>";
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


 
$button_2="<button name='alle_artikel_loeschen' value='alle_artikel' style=' height: 70px; width: 300px; font-size: 1.5rem'>$titel_9</button>";
    
$backgroundcolor="background-color: red";
$fontcolor="color: #FFF";    
    
$zaehler_korbid = 1;
    
$select_art_nr=mysqli_query($link," select korb_id, bio_id, artikel, art_nr, im_korb from $db_warenkorb where kaeufer_id = '$_COOKIE[verb_nr]' and laender_kennung = '$_COOKIE[laender_kennung]' and historie = '0'  order by korbid desc"); // and datum > '$mintag'
while ( $result_art_nr = mysqli_fetch_array($select_art_nr, MYSQLI_BOTH )) {
$bio_kennzahl_db=$result_art_nr['bio_id'];
$warenkorb_artikel=$result_art_nr['artikel'];
$warenkorb_korb_id=$result_art_nr['korb_id']; 
$die_im_korb=$result_art_nr['im_korb'];

    
	
$selectanbieter=mysqli_query($link," select kd_nr, bio_id, art_nr from $db_e_preis where artikel = '$result_art_nr[artikel]' and laender_kennung = '$_COOKIE[laender_kennung]' ");
while ( $resultanbieter = mysqli_fetch_array($selectanbieter , MYSQLI_BOTH )) {
$dieartikel_nr=$resultanbieter['art_nr'];
$diebio_id=$resultanbieter['bio_id'];
    
    
    
$anbieter_name=mysqli_query($link, "select kd_nr, an_bieter from $db_anbieter where kd_nr = '$resultanbieter[kd_nr]' ");
while ( $result_anbieter_name = mysqli_fetch_array( $anbieter_name, MYSQLI_BOTH ) ) {
$die_anbieter=$result_anbieter_name['an_bieter'];
$die_anbieter_kd_nr=$result_anbieter_name['kd_nr'];
		
$die_anbieter=substr("$die_anbieter",0,3);

if ( $die_im_korb == 1 ) {	
	
$backgroundcolor="background-color: #C1E97B";
$fontcolor="color: #000";
	
}
		
if ( $diebio_id == 1 ) { $background_color= "lightgreen"; }	
		
$nummern_fuer_korrektur=$dieartikel_nr.$warenkorb_korb_id.$die_anbieter_kd_nr;
		

$zeilenanfang="<td width='50%' style='text-align: left, background-color: transparent;' >";

if ( $zaehler_korbid % 2 == 1 )	{ $zeilenanfang="<tr><td>"; }   
    
$buttongekauft.=$zeilenanfang; 
    
$buttongekauft.="<button type='submit' name='artikel_gekauft' style='height: 40px; widtH: 120px; $backgroundcolor;' value='$nummern_fuer_korrektur'><font style=' font-size: 1.5rem; $fontcolor; font-weight: 700;'>$die_anbieter</button>";
		
$buttongekauft.=" <a href='preis_eintrag.php?artikel_gekauft=$nummern_fuer_korrektur' style='text-decoration: none'> <button type='button' style='height: 40px; width: 190px; background-color: #EDD099'>
    <font style=' font-size: 1.5rem; color: #000; font-weight: 400;'> &Auml;nderung</font>
</button></a>";	
		
$zeilenende="</td></tr>";	
		
//if ( $zaehler_korbid % 2 == 0 )	{ $zeilenende="</td></tr>";}
								
$buttongekauft.=$zeilenende;
		


$zaehler_korbid++;
		
}
   
}
    
$zaehler_korbid=1;
    
/*if ($zaehler_color % 2 == 0 ) { $b_color="#cacaca"; }
                         else { $b_color = ""; }
    */

$button_loeschen="<button name='artikel_loeschen' style='  height: 60px; widtH: 110px;' value='".$warenkorb_korb_id."'>l&ouml;schen</button>";


if ( $bio_kennzahl_db == 1 ) { $bio = "<font style='color: green; font-size: 1.5rem;'><br />BIO</font>"; }
                        else { $bio = ""; }
    
    
   
echo "<tr>";
echo "<td align='left' style=' background-color: #cacaca ;'><h2><font style='font-weight: 700;'>".$warenkorb_artikel.$bio."</h2></td>";                            
echo "<td align='right' style=' background-color: #cacaca ;'>".$button_loeschen."</td>";
echo "</tr>";  
	
echo "<tr>";
echo "<td colspan='2' align='left' style=' background-color: transparent;'>";
	
echo "<table>";	
   
echo $buttongekauft; 
    
echo "</table>";
    
echo "</td>";                            
echo "</tr>";
        
echo "<tr>";
echo "<td colspan='2' align='left' style='background-color: transparent;'>&nbsp;</td>";                            
echo "</tr>";     
    
$buttongekauft="";
$die_anbieter="";
$die_anbieter_id="";
	
$backgroundcolor="background-color: red";
$fontcolor="color: #FFF"; 	
    
// $zaehler_color++;
        
}

echo "<tr>";                          
echo "<td colspan='2' style=' vertical-align: middle; text-align: center; height: 100px; background-color: transparent;'>".$button_2."</td>"; 
echo "</tr>";  
    
echo "<tr>";
echo "<td colspan='2' align='left' style='background-color: transparent;'><br></td>";                            
echo "</tr>";

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
echo "</table>";



    $warenkorb_korb_id="";
    
}

?>
