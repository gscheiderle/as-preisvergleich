<?php

////////////////////////////////////////////////////////////
//
//  Ausgaben aufsummieren
//
//  Author:
//  Uwe Sack
//  Juli 2019
//  September 2019 erweitert
//
////////////////////////////////////////////////////////////

?>


<?php

if ( $_POST['ausgaben_abfragen'] == 'ausgabenabfragen' ) {
    
    $monat_auswahl=$_POST['monat_auswahl'];
    $jahr_auswahl=$_POST['jahr_auswahl'];
    
    if (
         ( ( $_POST['monat_auswahl'] == "" ) && ( $_POST['jahr_auswahl'] == "" ) ) ||
         ( ( $_POST['monat_auswahl'] == "" ) || ( $_POST['jahr_auswahl'] == "" ) ) 
       ) {
        
            $monat_auswahl=$monat;
            $jahr_auswahl=$jahr;
    }

    $selectsumme=mysqli_query($link, " select sum(summe) as gesamtsumme from $db_kassenbons where 
    monat = '$monat_auswahl' and jahr = '$jahr_auswahl' ");
    while ( $resultsumme = mysqli_fetch_array( $selectsumme, MYSQLI_BOTH ) ) {
        
        $gesamt_summe=$resultsumme['gesamtsumme']." &euro;";
    }
    
    
    
    $selectanbieter=mysqli_query($link, " select distinct anbieter, monat from $db_kassenbons where 
    monat = '$monat_auswahl' and jahr = '$jahr_auswahl' order by anbieter ");
    while ( $resultanbieter = mysqli_fetch_array( $selectanbieter, MYSQLI_BOTH ) ) {
        
        $select_anbietersumme=mysqli_query($link, " select sum(summe) as um_satz from $db_kassenbons where anbieter = '$resultanbieter[anbieter]' and monat = '$monat_auswahl' and jahr = '$jahr_auswahl' ");
        while ( $result_anbietersumme = mysqli_fetch_array( $select_anbietersumme, MYSQLI_BOTH ) ) {
            $result_anbieter_summe = $result_anbietersumme['um_satz'];
        }
        
            $sucheaussteller=mysqli_query($link, "select an_bieter from $db_anbieter where kd_nr = '$resultanbieter[anbieter]' ");
            while( $aussteller = mysqli_fetch_array( $sucheaussteller, MYSQLI_BOTH ) ) {
                $warenverkaeufer=$aussteller['an_bieter'];
            }
        
    $result_ausgaben.="<tr>".
                         "<td>".$warenverkaeufer."</td>".
                         "<td style='text-align: center;'>".$resultanbieter['monat']."</td>".
                         "<td style='text-align: right;'>".$result_anbieter_summe."</td>".
                      "</tr>";
    }
    
 
    
    $selectanlass=mysqlI_query($link, " select distinct anlass from $db_kassenbons where 
    monat = '$monat_auswahl' and jahr = '$jahr_auswahl' ");
    while ( $resultanlass = mysqli_fetch_array( $selectanlass, MYSQLI_BOTH ) ) {
        
      $selectkategorie=mysqli_query($link, " select kategorie from $db_kategorien where kat_id = '$resultanlass[anlass]' ");
        while ( $resultkat = mysqli_fetch_array( $selectkategorie, MYSQLI_BOTH ) ) {
            $result_kat = $resultkat['kategorie'];
        }
        
        
        $select_anlasssumme=mysqli_query($link, " select sum(summe) as anlasssumme from $db_kassenbons where anlass = '$resultanlass[anlass]' and monat = '$monat_auswahl' and jahr = '$jahr_auswahl' ");
        while ( $result_anlasssumme = mysqli_fetch_array( $select_anlasssumme, MYSQLI_BOTH ) ) {
            $result_anlass_summe=$result_anlasssumme['anlasssumme'];
            
            $anlasssummetotal=$anlasssummetotal+$result_anlasssumme['anlasssumme'];
        }
        
            $result_kategorien.="<tr>".
                         "<td>".$result_kat."</td>".
                         "<td style='text-align: right;'>".$result_anlass_summe."</td>".
                      "</tr>";
         
    }
 
}
 
?>