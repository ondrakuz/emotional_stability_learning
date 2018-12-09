<?php
  $uri = array($_SERVER['REQUEST_URI']);
  
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
  
  $langModel = new LanguagesModel();
  
  $tmp = preg_split("/\//", $uri[0]);
  $lang = $tmp[1];
  if($langModel->selectByTextId("'".htmlspecialchars($lang, ENT_QUOTES)."'")) require_once("administrator/includes/languages/$lang.php");
  
  $router = RouterController::getInstance();
  $router->ctrMain(array($_SERVER['REQUEST_URI']));

  $router->showView();
?>
