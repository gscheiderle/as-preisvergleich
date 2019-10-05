<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <title>Warenkorb</title>
    
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>

    
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
    
    
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/einkauf_styles.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/einkauf_styles_300.css">
</head>

<body style=" background-color: #C0BCBC">



    <?php echo "<form action='index.php?artikel_gekauft=$_POST[artikel_gekauft]&artikel_loeschen=$_POST[artikel_geloescht]' method='POST'>"; ?>
		
		
		
		

        <?php include_once("../mysql_connect_as.php"); ?>
        <?php include_once("../include/website_sperren.php"); ?>
        <?php include_once("../include/sprache.php"); ?>
        <?php include_once("include/temp_tabellen_loeschen.php"); ?>

        <div class="wrapper">
            
            
                        <?php include_once("../include/die_links.php"); ?>

<br>
            
           <?php include_once("include/autocomplete.php");?>

            <?php include_once("include/warenkorb_erstellen.php"); ?>



<br>



            <div class="artikel_eingabe">
                
                
                <div class="container-fluid">
        <div class="row">
    
    <div class="col">
        
<h1 class="display-5"><?php echo $titel_1; 
	                        echo "<a href='http://192.168.2.101/as/einkauf/der_einkauf.php?einkaufs_vorschlag=zeigen'><h3>$titel_4</h3></a>";?></h1>

                <br>
                

                <p>
<input name="artikel_3" type="search" placeholder="Artikel finden" list="artikel_3" style="text-align: center; font-size: 3rem, border-radius: 10px;"/>
                    <datalist id="artikel_3">

                       <?php 
          foreach( $artikel_gespeichert as $bekannte_artikel ) {
          echo $bekannte_artikel;
          }
           ?>
                    </datalist>
 

                </p>

                <br>


                <button type="submit" name="artikel_speichern" value="artikelspeichern">
                    <?php echo $titel_2; ?>
                </button>
                <br><br><br>

                <?php include_once("include/un_bekannte_artikel_speichern.php"); ?>

                <button type="submit" value="warenkorb" name="waren_korb">
                    <?php echo $titel_3; ?>
                </button><br><br>

               

                    <div class="waren_ausgabe">

          <?php include_once("include/einkaufsliste_verwalten.php"); ?>              
						
		  <?php include_once("include/was_ist_im_korb.php"); ?>

                    </div>
					
					


                <br>
     
            </div>
                   
    
    <div class="col">
<p>&nbsp;</p>
                </div>
                    </div>

    </form>
</body>
</html>