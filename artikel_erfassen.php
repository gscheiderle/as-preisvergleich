<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel-Eingabe am PC</title>


  <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles_fuer_pc.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
    
</head>

<body style="width: 95%; margin-left: auto; margin-right: auto; ">
    
 
<?php include_once("include/die_links.php"); ?>
<br>
   
<div class="container">
    <div class="row">
    <div class="col-sm-2"></div>
    
    <div class="col_sm-8">   
    
<?php
		  
$gekauftbei=substr("$_GET[artikel_gekauft]",-4,4);

$geloescht=substr("$_GET[artikel_gekauft]",-9,5);

$epreisartnr=substr("$_GET[artikel_gekauft]",0,8);
		  
?>

    <form action="artikel_erfassen.php" method="POST">
		
	<div class="wrapper">	  
        
            <?php include_once("mysql_connect_as.php"); ?>
		
             <?php include_once("include/website_sperren.php"); ?>

            <?php include_once("include/waehle_anbieter.php"); ?>
			
            <?php include_once("include/sprache.php"); ?>
			
            <?php include_once("einkauf/include/autocomplete.php"); ?>
			
            <?php include_once("include/waehle_packung.php"); ?>
			
            <?php include_once("include/waehle_kategorie.php"); ?>
        
            <?php include_once("include/artikel_speichern.php"); ?>
        

        
                    <?php echo $ergebnis; ?>


	  
	  <div class="headline_3"> <br>
	   

	 
      <h2>Artikel erfassen:</h2>
            
                <br>
            </div>
            <div class="artikel_eingabe">
<p>                <select name="anbieter_3" tabindex="1">
                    <option value="30000">w&auml;hle Anbieter</option>
                    <?php echo $anbieter_option_3; ?>
                </select></p>
                    <?php echo "<p>$kein_anbieter</p>"; ?>


<p>  <h3>           <select name="kategorie_3" tabindex="3">
                    <option value="20000">W&auml;hle Kategorie</option>
                    <?php echo $kategorie_option_3; ?>
                </select>
	<?php echo "&nbsp;
				<input type='checkbox' name='kategorie_bio_3' value='0' style='height: 40px; width: 40px; font-size: 36px; color: green' tabindex='4'><font style='height: 40px; width: 40px; size: 36px; color: green'> <b>BIO</b><h/3></font>";
	echo $_POST['kategorie_3_bio'];
	?>
				
				</p>
          

                
<?php echo "<p>$keine_kategorie</p>"; ?>

                <br>

                <h2>
 <?php echo "<p>$neuer_artikel_schon_vorhanden</p>"; ?>


           
 <p>      
	 <input type="search" list="neue_artikel_3" name="neue_artikel_3" placeholder="Neue Artikel" style="width: 700px; height: 70px; font-size: 36px;" tabindex="11">
                   <datalist id="neue_artikel_3">        
                      
                    <?php 
                     foreach( $artikel_gespeichert as $bekannte_artikel ) {
                              echo $bekannte_artikel;
                     }
                        ?>
                
                        
                        </datalist>

    </p>              
                  
 

                  
          
              <input type="search" list="gramm_packung_3" name="gramm_packung_3" placeholder="Menge" style= "width: 200px; height: 70px; font-size: 36px;" tabindex="13">
              <datalist id="gramm_packung_3">        
                      
                    <?php 
                        foreach( $packung_option_3 as $menge ) {
                        echo $menge;
                        }
                        ?>
                
                        
                        </datalist>
  &nbsp;            
                
    <input type="search" name="einheit_3" list="einheit_3" placeholder="Einheit" style="width: 240px; height: 70px; font-size: 36px;" tabindex="15">
      <datalist id="einheit_3">
<?php include_once("include/einheiten.php"); ?>
      </datalist>

				
&nbsp;			
				
				    <?php echo $kein_preis; ?>

                    &euro; <input type="text" name="artikel_preis_3" placeholder="0.00" value="<?php echo $_POST['artikel_preis_3']; ?>" style="width: 180px; height: 70px; font-size: 36px;" tabindex="17">
					
					<br><br>
					
					<input type="checkbox" name="sieben" value="<?php echo $mwstb; ?>" style=" height: 40px; width: 40px; font-size: 36px;">
					 plus 7% MWSt.
					&nbsp;
					
					<input type="checkbox" name="neunzehn" value="<?php echo $mwst; ?>" style=" height: 40px; width: 40px; font-size: 36px;">
					 plus 19% MWSt.</h1>
      <br>
      
      
                  <?php echo $hinweis_1; ?>
                <?php echo $meldung_c; ?>
                
<?php 
echo  "<br>
      <button type='submit' value='preiseingabe_3' name='preis_eingabe_3' tabindex='21'>Neuen Artikel speichern</button>
      <br><br>";
?>
                

      </h2>
    </div>
	  
</div>
        <div class="col-sm-2"></div>
        </div></div> 
			
		
   
    			</div>
  			</div>
		</form>
	</body>
</html>