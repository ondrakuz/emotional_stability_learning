<?php
  ini_set("display_errors", 1);
  error_reporting(E_ALL); // debug
  //error_reporting(E_ERROR); // production
  mb_internal_encoding("UTF-8");
  

  function fautoload($class)
  {
      if (preg_match('/Controller$/', $class))
          require_once("./controllers/" . $class . ".php");
      else
          require_once("./models/" . $class . ".php");
  }
  spl_autoload_register("fautoload");

  $router = RouterController::getInstance();
  $router->setView();

  $router->showView();
?>
