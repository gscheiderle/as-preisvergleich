
<?php
$oeffnen="oeffnen";
$zeigen="zeigen";
?>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">NAVIGATION</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/einkauf/index.php?einkaufszettel_zeigen=<?php echo $oeffnen;?>" target="_blanc" style=" text-decoration: none;">EINKAUFSZETTEL</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/einkauf/der_einkauf.php?einkaufs_vorschlag=<?php echo $zeigen;?>" target="_blanc" style=" text-decoration: none;">G&Uuml;NSTIGSTE EINKAUF</a>
      </li>	
      <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/artikel_eingabe_am_pc.php" target="_blanc" style=" text-decoration: none;">EINGABEN AM PC</a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/artikel_erfassen.php" target="_blanc" style=" text-decoration: none;">ARTIKEL ERFASSEN</a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/start.php" target="_blanc" style=" text-decoration: none;">ANBIETER/ARTIKEL/PREISE</a>
      </li>
              <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/historie.php" target="_blanc" style=" text-decoration: none;">HISTORIE</a>
      </li> 
              <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/eingabe_kassenbon.php" target="_blanc" style=" text-decoration: none;">KASSENBONS</a>
      </li> 
              <li class="nav-item">
        <a class="nav-link" href="http://192.168.2.101/as/index.php" target="_blanc" style=" text-decoration: none;">EINLOGGEN</a>
      </li> 
    </ul>
  </div>  
</nav>


