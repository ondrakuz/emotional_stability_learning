<?php
  function fautoload($class)
  {
    if (preg_match('/Controller$/', $class))
    {
      require_once("administrator/includes/controllers/" . $class . ".php");
    }
    else
      require_once("administrator/models/" . $class . ".php");
  }
  spl_autoload_register("fautoload");
  
  $router = RouterController::getInstance();
  $router->ctrMain(array($_SERVER['REQUEST_URI']));

  $router->showView();
?>
