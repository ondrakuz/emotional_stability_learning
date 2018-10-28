<?php
  function fautoload($class)
  {
      if (preg_match('/Controller$/', $class))
        require_once("controllers/" . $class . ".php");
      else
        require_once("models/" . $class . ".php");
  }
  spl_autoload_register("fautoload");

  $router = RouterController::getInstance();
  $router->ctrMain(array($_SERVER['REQUEST_URI']));

  $router->showView();
?>
