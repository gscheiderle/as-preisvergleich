<?php

 if (  $_POST['welcher_bon'] == "welcherbon"  /*||   $_POST['bon_speichern'] == "bonspeichern"*/  ||  isset( $_GET['submit'] ) )  { 
     
     
    $zaehler=100;
    
    $monat_auswahl=$_POST['monat_auswahl'];
    $jahr_auswahl=$_POST['jahr_auswahl'];
    
    
    if (
         ( ( $_POST['monat_auswahl'] == "" ) && ( $_POST['jahr_auswahl'] == "" ) ) ||
         ( ( $_POST['monat_auswahl'] == "" ) || ( $_POST['jahr_auswahl'] == "" ) ) 
       ) 
    {
        
            $monat_auswahl=$monat;
            $jahr_auswahl=$jahr;
    }

    $suche_bon=mysqli_query($link, " select bon_id, anbieter, summe, anlass, monat from $db_kassenbons order by bon_id desc limit 30 ");
    while ( $ergeb_nis = mysqli_fetch_array( $suche_bon, MYSQLI_BOTH ) ) {
        
   
        $ergebnisse=$ergeb_nis['bon_id'];
        
        
    $mysqul="select $db_anbieter.an_bieter as anb_ieter, $db_kategorien.kategorie as kate_gorie from $db_anbieter, $db_kategorien where $db_anbieter.kd_nr = '$ergeb_nis[anbieter]' and $db_kategorien.kat_id = '$ergeb_nis[anlass]' " ;   
        
        
        
    $suche_aussteller=mysqli_query($link, "$mysqul");
            while( $er_gebnis = mysqli_fetch_array( $suche_aussteller, MYSQLI_BOTH ) ) {
                $verkaeufer=$er_gebnis['anb_ieter'];
                $ware=$er_gebnis['kate_gorie'];
            }
    
        $summe="summe_".$zaehler;
        $submit="aendern_".$zaehler;
        $ware_name="ware_".$zaehler;
        $aldi="aldi_".$zaehler;
        $mo_nat="monat_".$zaehler;
        
        
    $ergebnis.="<tr>

    <td><input type='text' 
    style='background-color: transparent; width: 70px; border-color: transparent; color: #FFF; font-size: 1rem; font-weight: 400; text-align: left;' name='$aldi' value='$verkaeufer'>
    </td>
    
    
    <td><input type='text' 
    style='background-color: transparent ; width: 110px; border-color:transparent; color: #FFF; font-size: 1rem; font-weight: 400; text-align: left;' name='$ware_name' value='$ware'>
    </td>
    
    <td><input type='text' 
    style='background-color: transparent; width: 40px; border-color: transparent; color: #FFF; font-size: 1rem; font-weight: 400; text-align: center;' name='$mo_nat' value='$ergeb_nis[monat]'>
    </td>
    
    <td><input type='text' 
    style='background-color: transparent; width: 60px; border-color: transparent; color: #FFF; font-size: 1rem; font-weight: 700; text-align: right;' name='$summe' value='$ergeb_nis[summe]'>
    </td>
    
    <td><button style='background-color: transparent; width: 60px; height: 40px; border-color: transparent; color: #FFF; font-size: 1rem; font-weight: 700; text-align: right;' name='$submit' value='$ergebnisse'>&auml;ndern</button></td> 
    
                
                </tr>";
     
       
        
        if ( $_POST[$submit] == TRUE ) 
            
        {
            $select_kat_nr=mysqli_query($link, " select kat_id from $db_kategorien where kategorie like '%$_POST[$ware_name]%' limit 1 ");
            while ( $result_katnr = mysqli_fetch_array($select_kat_nr, MYSQLI_BOTH ) ) {
            $result_kat_nr=$result_katnr['kat_id'];
            }
            
            $select_verkaeufer=mysqli_query($link, " select kd_nr from $db_anbieter where an_bieter like '%$_POST[$aldi]%' limit 1 ");
            while ( $result_kdnr = mysqli_fetch_array($select_verkaeufer, MYSQLI_BOTH ) ) {
            $result_kd_nr=$result_kdnr['kd_nr'];
            }
            
            echo $_POST[$aldi];
            mysqli_query($link, "update $db_kassenbons set 
            
            summe = '$_POST[$summe]',
            anlass = '$result_kat_nr',
            anbieter = '$result_kd_nr',
            monat = '$monat'
            where bon_id = $_POST[$submit]
            
            ");
        }
        
        
   
        $zaehler++;
        
    }
  }
    
 






?>