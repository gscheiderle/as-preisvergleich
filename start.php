<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <title>Preisvergleich Startseite</title>

    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 990px)" href="css/styles_1000.css">
    

  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>

    
</head>

<body style="width: 95%; margin-left: auto; margin-right: auto">


<br>
   
   


    <form action="start.php" method="POST">
		
		     <?php // include_once("include/variablen.php"); ?>	

             <?php include_once("mysql_connect_as.php"); ?>
		
             <?php include_once("include/website_sperren.php"); ?>
		
        <div class="wrapper">


            <?php include_once("include/waehle_anbieter.php"); ?>
			
            <?php include_once("include/sprache.php"); ?>
			
            <?php include_once("include/waehle_artikel.php"); ?>
			
            <?php include_once("include/waehle_bio_artikel.php"); ?>
			
            <?php include_once("include/waehle_packung.php"); ?>
			
            <?php include_once("include/waehle_kategorie.php"); ?>
			
            <?php include_once("include/waehle_bio_kategorie.php"); ?>


            <div class="headline">
				
				

                <h1>PREIS-ANZEIGE</h1>
                <br>
            </div>
            <div class="preis_abfrage">

                <select name="anbieter_preis_abfrage">
                    <option value="11111">(alle) Anbieter</option>
                      <?php echo $anbieter_option_1; ?>
                </select>
                <font style=" font-size: 36px;"><br>
                    <div class="preis_abfrage_2">
                        Nur BIO-Artikel <input type="checkbox" name="nur_bio" value="nurbio" style=" height: 60px; width: 60px; font-size: 36px;"> ausgeben:</font>
                </div>
                <br><br>
                      
                <select name="artikel_preise">
                    <option value="22222">Artikel</option>
                    <?php echo $artikel_option_1; ?>
                </select>
                &nbsp;&nbsp;
                <select name="artikel_preise_bio" style="background-color: lightgreen;">
                    <option value="22222">Bio Artikel</option>
                    <?php echo $artikel_option_bio_1; ?>
                </select>
                    <?php echo $entweder_oder; ?>

                <br>
                <br>
                <button type="submit" value="preisausgabe" name="preis_ausgabe">Preis anzeigen</button>
                <br>
                <br>
                <br>
                <h2>
                    <?php include_once("include/ein_artikel_eines_anbieters.php");  ?>
                    <?php include_once("include/alle_artikel_eines_anbieters.php");  ?>
                    <?php include_once("include/alle_anbieter_eines_artikels.php");  ?>
                    <?php echo $ergebnis; ?>

                </h2>
                <br>

            </div>

            <?php include_once("include/preis_aendern.php"); ?>

            <div class="headline_2"><br>

                <h1>PREIS &Auml;NDERN</h1>
                <br>
            </div>
            <div class="preis_eingabe">
                <select name="anbieter_preis_aendern">
                    <option>w&auml;hle Anbieter</option>
                        <?php echo $anbieter_option_2; ?>
                </select>
                <br>
                <br>
                <select name="artikel">
                    <option value="44444">bekannte Artikel</option>
                        <?php echo $artikel_option_2; ?>
                </select>
                &nbsp;&nbsp;
                <select name="artikel_bio" style="background-color: lightblue;">
                    <option value="44444">bekannte Bio Artikel</option>
                        <?php echo $artikel_option_bio_2; ?>
                </select>
                <br>
                <br>

                
          <h3>


                    
       <input type="search" name="gramm_packung_2" list="gramm_packung_2" placeholder="Menge" style= "width: 240px; height: 90px; font-size: 48px;">
                    <datalist id="gramm_packung_2">
          
                    <?php 
                        foreach( $packung_option_2 as $menge_2 ) {
                        echo $menge_2;
                        }
                        
                        ?>
                    </datalist>

                    
                    
      <input type="search" name="einheit_2" list="einheit_2" placeholder="Einheit" style="width: 240px; height: 90px; font-size: 48px;">
       <datalist id="einheit_2">
      <option value=" g">
      <option value=" ml">
      <option value=" g Pckg.">
      <option value=" 0.75 Ltr.">
      <option value=" 1 Ltr.">
      <option value="Stueck">
      <option value="ohne">
      </datalist>
      
                    &euro; <input type="text" name="preiseingabe_2" placeholder="0.00" style="width: 180px; height: 90px; font-size: 48px;">
              
                                  					<br><br>
					
					plus <input type="checkbox" name="sieben" value="<?php echo $mwstb; ?>" style=" height: 40px; width: 40px; font-size: 36px;">
					  7%
					&nbsp;
					
					<input type="checkbox" name="neunzehn" value="<?php echo $mwst; ?>" style=" height: 40px; width: 40px; font-size: 36px;">
				 19% MWSt.</h3>
      <br>
      
                

      <br>
      <button type="submit" value="preiseingabe_2" name="preis_eingabe_2">Preis &auml;ndern</button>
      <br>
      <br>
    <?php echo $entweder_oder_2; ?>
		<?php echo $warnung; ?>
      <br>
      <br>
    </div>
    

	  
	  <div class="headline_3"> <br>
	   
       <?php include_once("include/autocomplete.php");?>
	   <?php include_once("include/bekannte_artikel_speichern.php"); ?>
       <?php include_once("include/un_bekannte_artikel_updaten.php"); ?>  
	 
      <h2>Artikel anlegen:</h2>
            
                <br>
            </div>
            <div class="artikel_eingabe">
                <select name="anbieter_3">
                    <option value="30000">w&auml;hle Anbieter</option>
                    <?php echo $anbieter_option_3; ?>
                </select>
                    <?php echo $kein_anbieter; ?>
                <br>
                <br>

                <select name="kategorie_3">
                    <option value="20000">Kategorie</option>
                    <?php echo $kategorie_option_3; ?>
                </select>
          

            <br>


                <select name="artikel_3">
                    <option value="10000">bekannte Artikel</option>
                    <?php echo $artikel_option_3; ?>
                </select>
                
                
                <br><br>
                
                
                <select name="kategorie_bio_3" style="background-color: lightgreen;">
                    <option value="20000">Bio-Kategorie</option>
                    <?php echo $kategorie_bio_option_3; ?>
                </select>
                <br>
                <select name="artikel_bio_3" style="background-color: lightgreen;">
                    <option value="10000">bekannte Bio-Artikel</option>
                    <?php echo $artikel_option_bio_3; ?>
                </select>
                
                <br>
                
<?php echo $keine_kategorie; ?>

                <br>

                <h2>Artikel erg&auml;nzen:</h2>
                    <?php echo $neuer_artikel_schon_vorhanden; ?>


           
 <p>         <input type="search" name="neue_artikel_3" placeholder="unbekannte Artikel" list="neue_artikel_3" style="width: 700px; height: 90px; font-size: 48px;">
          <datalist id="neue_artikel_3">
          
          <?php 
          foreach( $artikel_artikelnr as $artikel_3 ) {
          echo $artikel_3;
          }
           ?>
          </datalist>
          </p>              
                  
 
                
      <?php echo $kein_preis; ?>
                <br>
                <h3>
                   

      
          
              <input type="search" name="gramm_packung_3" list="gramm_packung_3" placeholder="Menge" style= "width: 240px; height: 90px; font-size: 48px;">
                    <datalist id="gramm_packung_3">
          
                    <?php 
                        foreach( $packung_option_3 as $menge ) {
                        echo $menge;
                        }
                        
                        ?>
                    </datalist>
                
                
    <input type="search" name="einheit_3" list="einheit_3" placeholder="Einheit" style="width: 240px; height: 90px; font-size: 48px;">
                    <datalist id="einheit_3">
      <option value=" g">
      <option value=" ml">
      <option value=" g Pckg.">
      <option value=" 0.75 Ltr.">
      <option value=" 1 Ltr.">
      <option value="Stueck">
      <option value="ohne">
      </datalist>

                     &euro; <input type="text" name="artikel_preis_3" placeholder="0.00" style="width: 180px; height: 90px; font-size: 48px;">
                    
                    					<br><br>
					
					plus <input type="checkbox" name="sieben" value="<?php echo $mwstb; ?>" style=" height: 40px; width: 40px; font-size: 36px;">
					  7%
					&nbsp;
					
					<input type="checkbox" name="neunzehn" value="<?php echo $mwst; ?>" style=" height: 40px; width: 40px; font-size: 36px;">
				 19% MWSt.</h1>
      <br>
                    
      </h2>
      <br>
      
      
                  <?php echo $hinweis_1; ?>
                
       <?php 
                echo 
    "<br>
<button type='submit' value='preiseingabe_3' name='preis_eingabe_3'>Neuen Artikel speichern</button>
<br>
<br>
<br>
<br>

<button type='submit' value='neuenartikelloeschen_3' name='neuen_artikel_loeschen_3'>Neuen Artikel l&ouml;schen</button>";
      ?>
                
                
    <?php include_once("include/neue_artikel_loeschen.php"); ?>            
      <br>
      <br>
      <br>
      <br>
    </div>
	  
	

    <div class="headline_4"> <br>
      
      <h2>Anbieter speichern</h2>
    <br>

    </div>
			
			
    <div class="anbieter_eingabe"> <br>
      <div id="textfeld">
        <input type="text" name="anbieter_eingabe" value="">
      </div>
      
      <br>

      <button type="submit" value="anbieterspeichern" name="anbieter_speichern">speichern</button>
      <br>
      <br>
	  <br>
      <br>
		                <?php include_once("include/anbieter_speichern.php"); ?>
        
   
    			</div>
  		
            </div>
        </div>
        
		</form>
	</body>
</html>