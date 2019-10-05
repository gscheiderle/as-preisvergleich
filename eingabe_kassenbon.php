<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <title>Ein-/Ausgabe KassenBon</title>

    <!--<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>-->

   
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
     <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles_kassenbon.css">
    
</head>

<body style="width: 95%; margin-left: auto; margin-right: auto; text-align: center; background-color: #C0BCBC">
    
<?php include_once("include/die_links.php"); ?>
    <br>
    
<?php
function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){return $db_ausdruck;}
	if($formular_ausdruck != ""){return $formular_ausdruck;}
  
  } 
  

echo "<form action='eingabe_kassenbon.php?submit=$submit' method='POST'>";
		
?>
        <?php include_once("mysql_connect_as.php"); ?>
        <?php include_once("include/waehle_anbieter.php"); ?>
        <?php include_once("include/kassenbon_speichern.php"); ?>
		<?php include_once("include/waehle_kategorie.php"); ?>
        
<div class="preis_eingabe">
            
<div class="container-fluid">
        <div class="row">
    
    <div class="col">
<br>
                <select name="anbieter_kassen_bon" tabindex="1">
                    <option value="11111"><h1> KASSENBON VON: </h1></option>
                      <?php echo $anbieter_option_1; ?>
                </select>
   <br><br>
   <input type="text" name="summe_bon" style="text-align: right;" placeholder="&uuml;ber 2.50 &euro;" tabindex="3">
    
     <br>
<br>


	<?php
   
	echo "<select name='anlass'  tabindex='5'>";

		echo "<option value='0'>der Anlass</option>";
		echo $kategorie_option_3; 
	    echo "</select>";
	?>
	
	<br><br>
    <div align="center">
        <table>
    <tr>
        <td align="center"><h2>Monat:
         </td>
            
            <td>&nbsp;</td>
            
        <td  align="center"><h2>Jahr:
        </td>
      </tr>
        
      <tr>
        <td align="center"><h2>
            <input type="text" name="monat_auswahl" style=' width: 150px; text-align: center;' value="<?php echo neuladen($monat,$_POST['monat_auswahl']); ?>"  tabindex="7">
        </td>
            
            <td>&nbsp;</td>
            
        <td  align="center"><h2>
            <input type="text" name="jahr_auswahl" style=' width: 150px; text-align: center;' value="<?php echo $jahr; ?>"  tabindex="9" >
        </td>
      </tr>    
        
    </table>
<br>
                <?php echo $meldung_a."<br>";?>
                <?php echo $meldung_c;?>
    
    
                <button type="submit" value="bonspeichern" name="bon_speichern" style="height: 60px; width: 250px; font-size: 2rem" tabindex="11">Bon speichern</button>

    <br>
    <br>
    <br>
<h1 display="2">AUSWERTUNG</h1>
<br>

 
  <div align="center"><table>
    
<tr>
        <td colspan="2" align="center">
<button type="submit" value="ausgabenabfragen" name="ausgaben_abfragen" style="height: 60px; width: 200px; font-size: 2rem" tabindex="13">Ausgaben ?</button><br>
<br>
</td></tr>
<?php include_once("include/ausgaben_berechnen.php"); ?>     
                <tr>
        <td colspan="2" align="center">
<button style="height: 60px; width: 200px; font-size: 2rem"><?php echo $gesamt_summe; ?></button><br>
<br>
</td></tr>
    </table>
      
  <table class="table table-hover">
    <thead class="thead-light">
       <tr>
        <th>ANBIETER</th>
        <th style=" text-align: center;">MONAT</th>
        <th style=" text-align: right;">UMSATZ</th>
      </tr>
    </thead>
      
 <tbody>  
<?php echo $result_ausgaben; ?>
  
  </tbody>
    </table>
      
      
      
        <table class="table table-hover">
    <thead class="thead-light">
       <tr>
        <th>KATEGORIE</th>
        <th style=" text-align: right;">UMSATZ</th>
      </tr>
    </thead>
      
 <tbody>  
<?php echo $result_kategorien; 
     
     echo "<tr>".
          "<td>TOTAL</td>".
          "<td style='text-align: right;'><b>".$anlasssummetotal."</b></td>".
           "</tr>";
     
     ?>
  
  </tbody>
    </table>
    
      
      
      
        </div>
          </div>
            </div>
        
        
        
        <div class="col">

        <?php include_once("include/welcher_bon_ist_eingetragen.php"); ?>

        
        <br>
<button type="submit" value="welcherbon" name="welcher_bon" style="height: 120px; width: 300px; font-size: 2rem" tabindex="15">Welche Bons sind eingetragen?</button><br><br>
        
<div align="center">
    
    <?php if ($_POST['welcher_bon'] == "welcherbon" )  { 
    
    echo  "<table class='table table-dark table-hover'> 
   
    <thead>
       <tr>
        <th style=' text-align: left;'>ANB.</th>
        <th style=' text-align: left;'>ANLASS</th>
        <th style=' text-align: center;'>MO.</th>
        <th style=' text-align: center;'>PREIS</th>
        <th style=' text-align: center;'>ACT.</th>
      </tr>
    </thead>
      
    <tbody>";  
   
echo $ergebnis;

echo "</tbody>
     </table>";
  }
    ?>
    
    
    </div>
     
     
    </div></div></div>
        
    			
  			</div>
		</form>
	</body>
</html>