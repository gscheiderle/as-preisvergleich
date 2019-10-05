

<?php

if ( $_POST['anbieter_speichern'] == "anbieterspeichern" ) {



$suche_anbieter=mysqli_query($link," select an_bieter from $db_anbieter where an_bieter = '$_POST[anbieter_eingabe]' ");
while ( $result_anbieter = mysqli_fetch_array($suche_anbieter, MYSQLI_BOTH )) { 
$result_anbieter=$result_anbieter['an_bieter'];

if ( $_POST['anbieter_eingabe'] == "" ) { echo $leere_anfrage="Sie starten eine leere Anfrage !";
exit;
}
    
if ( $result_anbieter == $_POST['anbieter_eingabe'] ) { echo $anbieter_vorhanden="Dieser Anbieter ist schon vorhanden !";
exit;
 }
                                                    
}

    
if ( $result_anbieter == "" ) {

$sperren=mysqli_query($link,"LOCK TABLES $db_kd_nr write, $db_kd_nr as $db_kd_nr read");

$select_kd_nr = mysqli_query($link,"select max(kd_nr) + 1 as kdnr from $db_kd_nr");
while ($result_kdnr=mysqli_fetch_array($select_kd_nr, MYSQLI_BOTH )) {
$neuekdnr=$result_kdnr['kdnr'];
 
mysqli_query($link," insert into $db_kd_nr (kd_nr) values ('$neuekdnr') ");
mysqli_query($link,"UNLOCK TABLES");

mysqli_query($link," insert into $db_anbieter (kd_nr, an_bieter) values ('$neuekdnr', '$_POST[anbieter_eingabe]') ");
} // ende while 2
} // ende IF 2
} // ende IF



?>