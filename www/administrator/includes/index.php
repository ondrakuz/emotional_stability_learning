<?php
/*
 *  _____ _______         _                      _
 * |_   _|__   __|       | |                    | |
 *   | |    | |_ __   ___| |___      _____  _ __| | __  ___ ____
 *   | |    | | '_ \ / _ \ __\ \ /\ / / _ \| '__| |/ / / __|_  /
 *  _| |_   | | | | |  __/ |_ \ V  V / (_) | |  |   < | (__ / /
 * |_____|  |_|_| |_|\___|\__| \_/\_/ \___/|_|  |_|\_(_)___/___|
 *                   ___
 *                  |  _|___ ___ ___
 *                  |  _|  _| -_| -_|  LICENCE
 *                  |_| |_| |___|___|
 *
 * IT ZPRAVODAJSTVÍ  <>  PROGRAMOVÁNÍ  <>  HW A SW  <>  KOMUNITA
 *
 * Tento zdrojový kód pochází z IT sociální sítě WWW.ITNETWORK.CZ
 *
 * Můžete ho upravovat a používat jak chcete, musíte však zmínit
 * odkaz na http://www.itnetwork.cz
 */

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
