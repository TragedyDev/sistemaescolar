<?php

include ('app/config.php');

  $url = $_SERVER["REQUEST_URL"];
   $conta = strlen($url);

   $rest = substr($url, 15, $conta);

    if("/pruebas.php" == $rest) {
    echo "es igual";
   }else{
    echo "no es igual"
   } 

?>