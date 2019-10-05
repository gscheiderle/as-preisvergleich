<?php
///////////////////////////////
//
// SPRACHE
//
// AUTHOR: UWE SACK
//
// JUNI 2019
//
//////////////////////////////
?>

<?php

// $noname['laender_kennung']="";

if ( ( ( $_COOKIE['laender_kennung'] == "BW" ) || ( $_GET['laender_kennung']  == "BW" ) ) || 
     ( ( $_COOKIE['laender_kennung'] == "Bd" ) || ( $_GET['laender_kennung']  == "Bd" ) ) 
    ) {
    
    $titel_1="Eikaafzedd'l";
    
    $titel_2="uff de' Eikaafzedd'l!";
    
    $titel_3="de' Eikaafzedd'l:";
        
    $titel_4="de billigsch'd Eikaaf:";
        
    $titel_5="zum Eikaafzedd'l!";    
    
    $titel_6="Atigg'l noihagge!";
    
    $titel_7="Do gehd's no !";
    
    $titel_8="alle Atigg'l/Preise";
	
	$titel_9="Eikaafzedd'l leere'";
    
    
}


if  (
    ( ( $_COOKIE['laender_kennung'] == "BY" ) || ( $_COOKIE['laender_kennung'] == "BUB" ) ) ||
    ( ( $_GET['laender_kennung']  == "BY" ) ||  ( $_GET['laender_kennung']  == "BUB" ) ) 
    )
{
    
    $titel_1="Einkaufszettel";
    
    $titel_2="Auf den Einkaufszettel!";
    
    $titel_3="Der Einkaufszettel:";
        
    $titel_4="Der billigste Einkauf:";
        
    $titel_5="Zum Einkaufszettel!";    
    
    $titel_6="Artikel/Preise eintragen!";
    
    $titel_7="Hier geht es weiter!";
    
    $titel_8="alle Artikel/Preise";
	
	$titel_9="Einkaufszettel leeren";
}