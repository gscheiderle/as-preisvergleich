<?php
/////////////////////////////////////////////////////
//
//  Website sperren,
//  wenn die Seite ohne Einloggen
//  aufgerufen wird.
//
//  Author:
//  Uwe Sack
//  Juli 2019
//
/////////////////////////////////////////////////////

?>

<?php


if ( ( $_COOKIE['laender_kennung'] == "" ) || ( $_COOKIE['verb_nr'] == "" ) || ( $_COOKIE['name'] == "" ) ){
	
	echo "<font style=' font-size: 72px; text-align: center; color: red; background-color: yellow; '";
	echo "<br><br>";

	echo "Sie sind nicht eingeloggt.";
	echo "<br>";
    echo "Melden Sie sich erneut an.";
	echo "<br>";
	echo "<a href='http://192.168.2.101/as'> Zur Anmeldung </a>";
	echo "<br><br>";
	
	exit;
	
}

?>