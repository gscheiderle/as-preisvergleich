<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <meta charset="utf-8">
    <title>Preisvergleich Startseite</title>

    <!--<script src="http://use.edgefonts.net/source-sans-pro:n2,n6,n4,n3:default.js" type="text/javascript">
</script>-->

    <link rel="stylesheet" type="text/css" media="screen and (min-width: 300px)" href="css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen and (min-width: 990px)" href="css/styles_1000.css">
</head>

<body class="body">


    <form action="update.php" method="POST">

             <?php include_once("mysql_connect_as.php"); ?>

        <div class="wrapper">
        
        <?php 
           
/*               $select_kdnr=mysqli_query($link, "select preis_id, packungsgroesse, preis from $db_e_preis ");
        while ( $result=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH  ) ) {
        
			
			$preis_100_g=($result['preis']/$result['packungsgroesse']);
        
        mysqli_query($link, "update $db_e_preis set hundert_g_preis = '$preis_100_g' where preis_id = '$result[preis_id]' ");
        }    
          */
        
			
		
/*      $select_kdnr=mysqli_query($link, "select preis_id, packungsgroesse, preis from $db_e_preis where einheit like '%ml' ");
        while ( $result=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH  ) ) {
        
            
            $preis_100_g=($result['preis']/$result['packungsgroesse']) * 100;
           
        
        mysqli_query($link, "update $db_e_preis set hundert_g_preis = '$preis_100_g' where preis_id = '$result[preis_id]' ");
        }

			*/
			
      /*   
	  
        $select_kdnr=mysqli_query($link, "select preis_id, packungsgroesse, preis from $db_e_preis where einheit = 'ml'");
        while ( $result=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH  ) ) {
        
        
        mysqli_query($link, "update $db_e_preis set hundert_g_preis = '$result[preis] / $result[packungsgroesse]*100' where preis_id = '$result[preis_id]' ");
        }*/
        
            
/*                    $select_kdnr=mysqli_query($link, "select preis_id, art_nr from $db_e_preis ");
        while ( $result=mysqli_fetch_array($select_kdnr, MYSQLI_BOTH  ) ) {
        
            $art_nr_short=substr("$result[art_nr]",-4,4);
        
        mysqli_query($link, "update $db_e_preis set art_nr_short = '$art_nr_short' where preis_id = '$result[preis_id]' ");
        }
            
            */
 // mysqli_query($link, "delete from $db_e_preis where kd_nr = '1003' and laender_kennung = 'BW' ");
            
/*$metro_uebertrag=mysqli_query($link, " select * from as_e_preis_2 ") ;
            while($result = mysqli_fetch_array($metro_uebertrag, MYSQLI_BOTH ) )  {
                
  
 $bw="BW";               

                
mysqli_query($link,"
insert into as_e_preis (
laender_kennung,
kd_nr, 
kat_id,
bio_id,
art_nr,
art_nr_short,
artikel,
packungsgroesse, 
einheit,
preis,
hundert_g_preis
) 
values 
(
'$bw',
'$result[kd_nr]',
'$result[kat_if]',
'$result[bio_id]',
'$result[art_nr]',
'$result[art_nr_short]',
'$result[artikel]',
'$result[packungsgroesse]',
'$result[einheit]',
'$result[preis]',
'$result[hundert_g_preis]'
)
");
}
            */

            
         ?>
        
        
        
        