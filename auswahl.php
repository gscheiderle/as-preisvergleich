<?php
session_start();
setcookie("verb_nr",substr("$_GET[breackiex]",19,4));
setcookie("laender_kennung",$_GET['laender_kennung']);
setcookie("name",$_GET['name']);
setcookie("session",session_id());


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//DE">
<html>
  <head>
    <title>Auswahl</title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    
<script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 990px)" href="css/styles_1000.css">


  </head>
  <body leftmargin="0px" topmargin="0px">

<?php echo "<form action='auswahl.php' method='POST'>"; 



include_once("mysql_connect_as.php");
include_once("include/sprache.php"); 


?>  
  

<!-- /////////////////////////////////////////////////////////////////////////////////// //-->

<div class="wrapper">


            <div class="headline">
            <h2>
            <font style=" color: red;">
            <?php 
				
				if ( $_GET['laender_kennung'] == 'BW' ) {$land="BADEN";}
				if ( $_GET['laender_kennung'] == 'BY' ) {$land="FRANKEN";}
				
				
				echo "<br>&nbsp;&nbsp;Hi, ".$_GET['name']." !<br>"; ?>
                <?php echo "&nbsp;&nbsp;Sch&ouml;n Dich wieder <br>&nbsp;&nbsp;auf gscheiderle.de<br>
				&nbsp;&nbsp;zu sehen !"; ?></h2><br>
            </font>   
            </div>
            <div class="preis_abfrage">


<br><br><br>
<div align="center">
<table width="600px">
<tr>

<?php


include_once("include/die_links_alt.php");
	
?>
	
</table>
<br><br><br><br><br>

   </div>
  </div>
 </div>
