<?php
  error_reporting(E_ALL); // debug
  //error_reporting(E_ERROR); // production
mb_internal_encoding("UTF-8");

function fautoload($class)
{
    if (preg_match('/Controller$/', $class))
        require("controllers/" . $class . ".php");
    else
        require("models/" . $class . ".php");
}
spl_autoload_register("fautoload");

$router = new RouterController();
$router->setView();

$router->showView();
?>
