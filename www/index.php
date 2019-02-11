<?php
  ini_set("display_errors", 1);
//  error_reporting(E_ALL); // debug
  error_reporting(E_ERROR); // production
  mb_internal_encoding("UTF-8");
  
  $uri = $_SERVER['REQUEST_URI'];
  if (preg_match('/\/administrator/', $uri))
  {
    require('./administrator/admin.php');
  }
  else
  {
    require('./administrator/includes/index.php');
  }
?>
