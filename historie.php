<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <title>Einkauf-Historie</title>

    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
          <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script> <src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript"></script>	
    
    
</head>

<body style="width: 95%; margin-left: auto; margin-right: auto; text-align: center">
 <?php include_once("include/die_links.php"); ?>
    <br>  


    <form action="historie.php" method="POST">
		
		<?php include_once("include/website_sperren.php"); ?>

             <?php include_once("mysql_connect_as.php"); ?>

        <div class="wrapper">


<div class="preis_eingabe">
            
<?php include_once("links.php"); ?>
    <?php include_once("include/historie_auswerten.php"); ?>
                

<h1> A U S W E R T U N G </h1>
<br>

    
    
    <div align="center"><table>

        
        <tr>
        <td colspan="2" align="center"> <br>
<br>
<button type="submit" value="ausgabenabfragen" name="ausgaben_abfragen" style="width: 900px; height: 120px;">Welche Ausgaben wo</button><br>
<br>
</td></tr>
   
                <tr>
        <td colspan="2" align="center"> <br>

<br>
</td></tr>
    </table> 
        
 <?php       
        echo "<div align='center'>";    
    
echo "<table>";
echo "<tr>";
echo "<td colspan='3'><hr style='height: 10px; background-color: red;'></td>";                           
echo "</tr>";

echo "
<tr>
    <td align='left' style=' background-color: $b_color;'><h2>ANBIETER</td>
    <td align='right' style=' background-color: $b_color;'><h2>UMSATZ</td>
    <td align='right' style=' background-color: $b_color;'><h2>PROZENT</td>
</tr>";

 echo "<tr><td colspan='3'><hr><hr></td></tr> ";
    
    foreach( $warenkorb as $waren_korb ) {
    echo $waren_korb;
        
    }
        
echo "<tr><td colspan='3'><hr><hr></td></tr> 
      <td align='left' style=' background-color: $b_color;'><h2> </td>
      <td align='right' style=' background-color: $b_color;'><h2>$gesamt_summe</td>
      <td align='right' style=' background-color: $b_color;'><h2>$prozent_summe</td>
    
    </table>";
 
    
        
?>        
    			</div>
  			</div>
		</form>
	</body>
</html>