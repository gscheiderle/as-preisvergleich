<?php
////////////////////////////////////////////////
//
//  Kassenbon speichern
//
//  Author:
//  Uwe Sack
//
//  Juli 2019
//
////////////////////////////////////////////////
?>


<?php

$bedingung_a = 1;

if ( $_POST['bon_speichern'] == "bonspeichern" ) {


if ( $_POST['anbieter_kassen_bon'] == 11111 ) {
    
    $bedingung_a = 0;
    $meldung_a="<h1>Sie müssen einen Anbieter ausw&auml;hlen!</h1> <br> <br> ";
    
}

    
if ( $_POST['summe_bon'] == "" ) {
    
    
    

    $bedingung_a = 0;
    $meldung_a="<h1>Sie müssen einen Betrag angeben!</h1> <br> <br> ";
    
}    
    
    
if ( substr($_POST['summe_bon'], -3, -2) == "." || substr($_POST['summe_bon'], -3, -2) == "," ) {
$_POST['summe_bon']=substr_replace($_POST['summe_bon'], '.', -3, 1);
}

else { $meldung_c="<h1>Preis bitte mit 2 Dezimalstellen (. oder ,) eingeben !</h1>";
       $bedingung_a = 0; }     
    

if ( $bedingung_a == 1 ) 
    
      
    mysqli_query($link, "insert into $db_kassenbons 
    (
    anbieter,
    summe,
    anlass,
    monat,
    jahr,
    laender_kennung,
    verb_nr
    )
    values
    (
    '$_POST[anbieter_kassen_bon]',
    '$_POST[summe_bon]',
    '$_POST[anlass]',
    '$_POST[monat_auswahl]',
    '$_POST[jahr_auswahl]',
    '$_COOKIE[laender_kennung]',
    '$_COOKIE[verb_nr]'
    )
    ");
    
    
}