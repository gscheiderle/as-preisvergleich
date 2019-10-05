<?php
session_start();
?>
<html>
<head>
    <meta http-equiv="Content-Language" content="de">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <meta name="GENERATOR" content="Adobe Dreamwaver">
    <meta name="ProgId" content="Adobe Dreamwaver">

    <title>Anmeldung as-bio</title>
    <base target="_self">

    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 990px)" href="css/styles_1000.css">

</head>


<?php 

echo "<form  action='index.php' method='POST'>"; ?>



<body <?php echo $bgcolor; ?> link="#000000" vlink="#000000" alink="#000000" topmargin="30">

    <br>

    <div class="wrapper">




    </div>
    <div class="preis_abfrage">


        <br><br><br>




        <?php 
        
        include_once("mysql_connect_as.php");



  
//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}
$_SESSION['zufall_id'] = $zufall_id;


      
$datum=date("Y-m-d");
$skonto_datum=strtotime("$datum");
 ?>


        <?php  echo "<h1>Login eingeben:<br><br>
       Petra f&uuml;r FRANKEN<br>
       Uwe f&uuml;r BAW&Uuml;<br>
	   Uwe S. f&uuml;r BADEN<br>
      </h1>"; ?>
        <br><br><br>

        <select name="password" size="1" tabindex="2">
            <option value="0">Benutzer w&auml;hlen</option>
            <option value="6001">Uwe</option>
            <option value="6020">Petra</option>
            <option value="6002">Uwe S.</option>
        </select>

        <br><br>
        <p><button type="submit" value="einloggen" name="password_selec">einloggen</button>
        </p>
        <br><br>

        <?php

        if ( $_POST[ 'password' ] == 6001 ) {
            $laender_kennung = "BW";
            $name = "Uwe";
        }
        
        
        if ( $_POST[ 'password' ] == 6020 ) {
            $laender_kennung = "BY";
            $name = "Petra";
        }
        
        
        if ( $_POST[ 'password' ] == 6030 ) {
            $laender_kennung = "BUB";
            $name = "UUP";
        }
        
         if ( $_POST[ 'password' ] == 6002 ) {
            $laender_kennung = "BW";
            $name = "Uwe S.";
        }
        


        //zufallszahl erzeugen
  if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}
        $vorne = substr( "$zufall_id", 0, 13 );
        $hinten = substr( "$zufall_id", 13, 19 );
        $breackiex .= $hinten;
        $breackiex .= $_POST[ 'password' ];
        $breackiex .= $vorne;

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


        if ( ( $_POST[ 'password_selec' ] == "einloggen" ) && ( $_POST[ 'password' ] != 0 ) ) {

            echo "
      <tr>
        <td width='100%' height='50' align='right' valign='middle' colspan='2' background-color='red'>
        
        
        <a href='auswahl.php?breackiex=$breackiex&laender_kennung=$laender_kennung&name=$name' target='_blanc'><h2>Hier geht's weiter !</a>
   
        
        </td>
     </tr>

  <tr><td>
  <table border='0' width='100%' height='' bgcolor='#C0C0C0'>
  </table>";

        }
 ?>


        </center>
    </div>
</form>
                </td>
            </tr>
        </table>
    </center>
</div>

    </body>
</html>