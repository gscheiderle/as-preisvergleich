<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("links.xml");

$x=$xmlDoc->getElementsByTagName('button');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('value');
    $z=$x->item($i)->getElementsByTagName('name');
    $zi=$x->item($i)->getElementsByTagName('width');  
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint= "<option value='".
          $z->item(0)->childNodes->item(0)->nodeValue .
          "'>" .
          $y->item(0)->childNodes->item(0)->nodeValue .
          " - " .
          $zi->item(0)->childNodes->item(0)->nodeValue . 
          "</option>";    
        } else {
          $hint=$hint . "<br /><option value='".
          $z->item(0)->childNodes->item(0)->nodeValue .
          "'>" .
          $y->item(0)->childNodes->item(0)->nodeValue .
            " - " .
          $zi->item(0)->childNodes->item(0)->nodeValue .
          "</option>"; 
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response

echo "<select name='result'>";
echo $response;
echo "</select>";



?> 