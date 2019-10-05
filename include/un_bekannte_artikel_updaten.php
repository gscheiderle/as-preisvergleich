
<?php


//////////////////////////////////////
//
// Daten auch aus autokomplete.php
//
/////////////////////////////////////



if ( ( $_POST['preis_eingabe_3'] == "preiseingabe_3" ) && ( $_POST['neue_artikel_3'] != "" ) ) { // IF 1
    

       
$bedingung_1=TRUE; 
    
if ( substr($_POST['artikel_preis_3'], -3, -2) == "." || substr($_POST['artikel_preis_3'], -3, -2) == "," ) {
$_POST['artikel_preis_3']=substr_replace($_POST['artikel_preis_3'], '.', -3, 1);
}

else { $meldung_c="<h1>Preis bitte mit 2 Dezimalstellen (. oder ,) eingeben !</h1>";
       $bedingung_1=FALSE; 
     }   

    
if ( substr("$_POST[neue_artikel_3]",-9,4) == 9999 )  { 
    
$alte_art_nr=substr("$_POST[neue_artikel_3]",-5,4);    


if ( $_POST['kategorie_3'] != 20000 ) {$bio_kennzahl = 0; 
                                       $postkategorie = $_POST['kategorie_3']; 
                                      }
if ( $_POST['kategorie_bio_3'] == TRUE ) {$bio_kennzahl = 1; 
                                        $postkategorie = $_POST['kategorie_bio_3']; 
                                          }
    
    

$neue_artikel_3=$_POST['neue_artikel_3'];  
htmlspecialchars($neue_artikel_3);
 
// Artikel-Namen seprarieren    
$neue_artikel_3_artikel=substr("$neue_artikel_3",0,-11);
    // $neue_artikel_3_artikel=trim($neue_artikel_3_artikel);
    
    
////////////////////////////////////////////////////////////////////////////////    

    $korrigierte_art_nr=$alte_art_nr;
    
    mysqli_query($link," update $db_artikel set kat_id = '$postkategorie', bio_id = '$bio_kennzahl' where art_nr = '$alte_art_nr' ");   

    
    
///////////////////////////////////////////////////////////////////////////////////    

$select_doppelte_artikel=mysqli_query($link," select art_nr, artikel as ar_tikel from $db_artikel where $db_artikel.artikel = '$neue_artikel_3_artikel' and $db_artikel.art_nr < '$alte_art_nr' "); 
while ( $result_doppelte_artikel = mysqli_fetch_array( $select_doppelte_artikel , MYSQLI_BOTH )) {
    
if ( $result_doppelte_artikel['ar_tikel'] != "" ) {
    
    $korrigierte_art_nr=$result_doppelte_artikel['art_nr'];
    
    mysqli_query($link," delete from $db_artikel where art_nr = '$alte_art_nr' ");  
    

} // ende IF
   
} // ende while

    
//////////////////////////////////////////////////////////////////////////////////
    


    
    

if ( $_POST['anbieter_3'] == 30000 ) {
$kein_anbieter="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte einen Anbieter w&aauml;hlen !</font><br>";
$bedingung_1=FALSE;
}

if ( ($_POST['kategorie_3'] == 20000 ) /*&& ( $_POST['kategorie_bio_3'] == 20000 )*/ ) { 
$keine_kategorie="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte eine Kategorie w&auml;hlen !</font><br>";
$bedingung_1 = FALSE; }

/*if ( ( $_POST['kategorie_3'] != 20000 ) && ( $_POST['kategorie_bio_3'] != 20000 ) ) { 
$keine_kategorie="<h3><font style='color: #FFFFFF; background-color: red;'>Nur EINE Kategorie w&auml;hlen !</font><br>";
$bedingung_1 = FALSE; }*/

if ( $_POST['artikel_preis_3'] == "" ) { 
$kein_preis="<h3><font style='color: #FFFFFF; background-color: red;'>Bitte einen Preis angeben !</font><br>";
$bedingung_1 = FALSE; }


if ( $bedingung_1 == TRUE ) {
    
    
$neue_einheit_3=$_POST[einheit_3];  
$neue_einheit_3=htmlspecialchars($neue_einheit_3);
    


$artikel_nummer_epreis=$_POST['anbieter_3'].$korrigierte_art_nr;

$prov_artikel_nr=substr("$_POST[neue_artikel_3]",-9,8);

$artikel_preis_3=$_POST['artikel_preis_3'];
	
	
if ( $_POST['sieben'] == $mwstb ) { echo $artikel_preis_3=($_POST['artikel_preis_3'] / 100) * (100+$mwstb); }
if ( $_POST['neunzehn'] == $mwst ) { echo $artikel_preis_3=($_POST['artikel_preis_3'] / 100) * (100+$mwst); }		
	
    
   $preis_100_g = ($artikel_preis_3 / $_POST['gramm_packung_3'] );
    
    if ( trim($_POST['einheit_3']) == "g" || trim($_POST['einheit_3']) == "ml" ) {
         $preis_100_g= ($artikel_preis_3/$_POST['gramm_packung_3'] ) * 100;
    }    
            


mysqli_query($link," update $db_e_preis set

kd_nr = '$_POST[anbieter_3]',
kat_id= '$postkategorie',
bio_id = '$bio_kennzahl',
art_nr = '$artikel_nummer_epreis',
packungsgroesse = '$_POST[gramm_packung_3]',
einheit = '$neue_einheit_3',
preis = '$artikel_preis_3',
hundert_g_preis = '$preis_100_g'

where art_nr = '$prov_artikel_nr' ");
 
    

    
$select_anbieter=mysqli_query($link, "select an_bieter from $db_anbieter where kd_nr = '$_POST[anbieter_3]' ");
    while ( $resultanbieter = mysqli_fetch_array( $select_anbieter, MYSQLI_BOTH ) ) {
       $anbieter=$resultanbieter['an_bieter'];
    }
 

    
mysqli_query($link," update $db_warenkorb set

anbieter_id = '$_POST[anbieter_3]',
anbieter = '$anbieter',
kategorie= '$postkategorie',
bio_id = '$bio_kennzahl',
art_nr = '$korrigierte_art_nr',
packung = '$_POST[gramm_packung_3]',
einheit = '$neue_einheit_3',
preis = '$artikel_preis_3',
preis_100_g = '$preis_100_g'

where art_nr = '$alte_art_nr' ");    
	
	
mysqli_query($link," update $db_warenkorb_historie set

anbieter_id = '$_POST[anbieter_3]',
anbieter = '$anbieter',
kategorie= '$postkategorie',
bio_id = '$bio_kennzahl',
art_nr = '$korrigierte_art_nr',
packung = '$_POST[gramm_packung_3]',
einheit = '$neue_einheit_3',
preis = '$artikel_preis_3',
preis_100_g = '$preis_100_g'

where art_nr = '$alte_art_nr' "); 	
    
     
    

}
    
    
    
} // ende while

    
} // ende if-Bedigung

// } // ende IF 1



?>