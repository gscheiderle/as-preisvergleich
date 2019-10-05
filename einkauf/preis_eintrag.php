<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <title>Preisvergleich Startseite</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	


        
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 990px)" href="../css/styles_1000.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="../css/styles.css">
</head>


<body style="width: 95%; margin-left: auto; margin-right: auto; text-align: center; background-color: #C0BCBC">
    
<?php echo "<form action='preis_eintrag.php?artikel_gekauft=$_GET[artikel_gekauft]' method='POST'>"; ?>   
    
    

<?php	

$gekauftbei=substr("$_GET[artikel_gekauft]",-4,4);

$artikel_gekauft=substr("$_GET[artikel_gekauft]",4,4);

$epreisartnr=substr("$_GET[artikel_gekauft]",0,8);
	
$artikel_nummer_epreis=substr("$_GET[artikel_gekauft]",0,8);
	
$den_korb_id=substr("$_GET[artikel_gekauft]",8,5);	
		
?>    
    
<?php 
    
function neuladen($db_ausdruck,$formular_ausdruck)
  {
  if($formular_ausdruck == ""){return $db_ausdruck;}
	if($formular_ausdruck != ""){return $formular_ausdruck;}
  
  } 
?>  
    
<?php include_once("../include/die_links.php"); ?>
    <br>  

  
    <div class="preis_eingabe">
            
<div class="container-fluid">
        <div class="row">
    
    <div class="col">
<br>
		

	
<?php include_once("../mysql_connect_as.php"); ?>
        
<?php include_once("../include/website_sperren.php"); ?>
        
<?php
$selectdenanbieter=mysqli_query($link, "select an_bieter from $db_anbieter where kd_nr = '$gekauftbei' ");
		while ( $resultdenanbieter = mysqli_fetch_array( $selectdenanbieter, MYSQLI_BOTH ) ) {
			
		$den_anbieter=$resultdenanbieter['an_bieter'];
		}
		
$selectdenartikel=mysqli_query($link, "select bio_id, artikel, packungsgroesse, einheit, preis from $db_e_preis where art_nr = '$epreisartnr' ");
		while ( $resultdenartikel = mysqli_fetch_array( $selectdenartikel, MYSQLI_BOTH ) ) {
			
		    $den_bio_id=$resultdenartikel['bio_id'];
			$den_artikel=$resultdenartikel['artikel'];
			$den_packungsgroesse=$resultdenartikel['packungsgroesse'];
			$den_einheit=$resultdenartikel['einheit'];
			$den_preis=$resultdenartikel['preis'];
		}		
?>		
			
<?php include_once("../include/waehle_anbieter.php"); ?>
        
        
<?php include_once("include/preis_aendern.php"); ?>
        
    		

 <?php  echo "<a href='index.php?einkaufszettel_zeigen=$oeffnen'><h4><font style='background-color: orange'>&nbsp;Zur&uuml;ck zum Einkaufs-Zettel&nbsp;</font></h4></a>"; ?>              
                


         <h3>Bisherige Angaben:</h3>
                
            
	
           <h1 class="display-5">
			<div class="preis_eingabe">	
<?php if ( $den_bio_id == 1 ) { $BIO="<font style='color: green'> BIO"; }	?>
					
				<?php 	if ( $gekauftbei == 9999 ) { ?>
                <div align="left">
                                <select name="anbieter_preis_aendern" style="font-size:2.5rem;">
                    <option>w&auml;hle Anbieter</option>
                        <?php echo $anbieter_option_2; ?>
                </select>
                </div>
               </div>
				<?php } 
					
					else { 
						echo "<h3>".$den_anbieter; 
					    
					}
      
                
      echo "<h3>";
      echo $den_artikel." </h3>"; 
	  echo "<h3><b>".$BIO."</b></h3>";
      
?>	

<?php 
					
				if ( $gekauftbei == 9999 ) {
					
					echo " <h3>Bio ? <input type='checkbox' value='1' name='bio_code' style=' height:3rem; width: 3rem'></h3><br />";
				}
				
				?>
				
				<input type="hidden" name="artikel_bio" value="44444">

               
                <h4>  
                <?php  
                if ( $den_packungsgroesse < 0.001 ) { echo  
				" <input type='text' name='gramm_packung_2' placeholder='Menge' value='$_POST[gramm_packung_2]' style='width: 220px; height: 60px; font-size: 48px;'> "; }
                else { echo
                     " <input type='text' name='gramm_packung_2' value='".neuladen($den_packungsgroesse,$_POST['gramm_packung_2'])."' style= 'width: 170px; height: 60px; font-size: 48px;'> Menge "; }
               ?>
                <?php
				if ( $den_einheit == "" ) 
                { echo 
				"<p><input type='search' name='einheit_2' list='einheit_2' placeholder='Einheit' value='$_POST[einheit_2]' style='width: 220px; height: 60px; font-size: 48px;'>"; }
                else { echo 
				"<p><input type='search' name='einheit_2' list='einheit_2' value='".neuladen($den_einheit,$_POST['einheit_2'])."' style='width: 170px; height: 60px; font-size: 48px;'> Einheit"; }
                ?>   
                  <datalist id="einheit_2">
<?php include_once("../include/einheiten.php"); ?>
      </datalist></p>
               
               
               
               
                 
                <?php 
                if ( $den_preis < 0.001 )
                { echo "
                <p><input type='text' name='preiseingabe_2' placeholder='Preis &euro;' value='$_POST[preiseingabe_2]' style='width: 220px; height: 60px; font-size: 48px;'></p>"; }
                 
                else { echo   
                "<p><input type='text' name='preiseingabe_2' value='".neuladen($den_preis,$_POST['preiseingabe_2'])."' style='width: 170px; height: 60px; font-size: 48px;'> Preis</p>"; }    
               ?></p>
               
<br>
				
				<input type="checkbox" name="sieben" value="<?php echo $mwstb; ?>" style=" height: 2rem; width: 2rem; font-size: 2rem;">
                <font style="font-size: 2rem;"> 7% MWSt.</font>
					<br>
					
					<input type="checkbox" name="neunzehn" value="<?php echo $mwst; ?>" style=" height: 2rem; width: 2rem; font-size: 2rem;">
                        <font style="font-size: 2rem;"> 19% MWSt.</font>

          
 
				
	
      <br><br>
      <button type="submit" value="preiseingabe_2" name="preis_eingabe_2" style=" width: 200px; height: 50px; font-size: 2rem; border-radius: 5px">&Auml;ndern</button>
      <br>
        </h4>
    
<?php    
$oeffnen="oeffnen";
?>               

<?php  				
echo "<p><a href='index.php?einkaufszettel_zeigen=$oeffnen'><h4><font style='background-color: orange; color: #000'>&nbsp;Zur&uuml;ck zum Einkaufs-Zettel&nbsp;</font></h4></a></p>"; 
?>  
    
    
				
<?php // include_once("include/preis_aendern.php"); ?>
<?php echo $entweder_oder_2; ?>
	
      <br>
      <br>
                    
        </div>
    <div class="col">
<br>
   
    			</div>
  			</div>
		</form>
	</body>
</html>