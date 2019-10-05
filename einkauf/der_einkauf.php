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



    <?php echo "<form action='der_einkauf.php?artikel_gekauft=$_POST[artikel_gekauft]&artikel_loeschen=$_POST[artikel_geloescht]' method='POST'>"; ?>
		
		
		
		

        <?php include_once("../mysql_connect_as.php"); ?>
        <?php include_once("../include/website_sperren.php"); ?>
        <?php include_once("../include/sprache.php"); ?>
        <?php include_once("include/temp_tabellen_loeschen.php"); ?>

        <div class="wrapper">
            
            
        <?php include_once("../include/die_links.php"); ?>

<br /><br />


<div class="artikel_eingabe">
                
                
 <div class="container-fluid">
        <div class="row">
    
    <div class="col">
		<br />
        
<h1 class="display-5"><?php echo $titel_4; 
	                        echo "<a href='http://192.168.2.101/as/einkauf/index.php?einkaufszettel_zeigen=oeffnen'><h3>$titel_1</h3></a>";?></h1>

                <br />
                

 <div class="anbieter_eingabe">
                    

                    <?php include_once("include/create_cart_table.php");  
                          include_once("include/was_wo_kaufen.php"); ?>
                </div>
        

                
            </div>
                   
    
    <div class="col">
<p>&nbsp;</p>
                </div>
                    </div>

    </form>
</body>
</html>