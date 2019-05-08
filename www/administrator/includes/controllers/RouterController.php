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

class RouterController extends Controller
{
  protected $controller;
  protected $error = '';
  protected $isError = false;
  static private $instance = null;

  static function getInstance()
  {
    if (self::$instance == null) 
    {
      self::$instance = new RouterController();
    }
    return self::$instance;
  }
  
  private function camelNotation($text) 
  {
    $sentence = str_replace('-', ' ', $text);
    $sentence = ucwords($sentence);
    $sentence = str_replace(' ', '', $sentence);
    return $sentence;
  }

  private function parseURL($url)
  {
    // Naparsuje jednotlivé části URL adresy do asociativního pole
    $parsedURL = parse_url($url);
    // Odstranění počátečního lomítka
    $parsedURL["path"] = ltrim($parsedURL["path"], "/");
    // Odstranění bílých znaků kolem adresy
    $parsedURL["path"] = trim($parsedURL["path"]);
    // Rozbití řetězce podle lomítek
    $divPath = explode("/", $parsedURL["path"]);
    return $divPath;
  }
  
  public function setError($text)
  {
    $this->error = $text;
    $this->isError = true;
  }
  
  public function getError()
  {
    return $this->error;
  }
  
  public function ctrMain($parameters)
  {
      // language should be 1. parameter of url
      $parsedURL = $this->parseURL($parameters[0]);
      global $expressions, $lang;
//       $lang = array_shift($parsedURL);
//       print_r($parsedURL);
//       exit;
      $langModel = new LanguagesModel();
      $fuserModel = new FUsersModel();
      
      $tmp = array_shift($parsedURL);
      $language = $langModel->selectByTextId("'".htmlspecialchars($lang, ENT_QUOTES)."'");
//       print_r($language);
//       exit;
    if (empty($language)) $this->redirect('/cs'); // if not language in url, redirect to url with default language
    
    if (empty($parsedURL[0]))
    { 
      $this->controller = new HomePageController();
    }
    else
    {
      // controller is 2. parameter of URL
      $view = array_shift($parsedURL);
      $controllerClass = $this->camelNotation($view) . 'Controller';
//       echo("<br />\$controllerClass = $controllerClass<br /><br />\n");
//       exit;
      
      if (file_exists('./administrator/includes/controllers/' . $controllerClass . '.php'))
      {
        if ($view == 'error')
        {
          $this->controller = new $controllerClass('');
        }
        else
        {
          $this->controller = new $controllerClass;
        }
      }
      else
      {
        $this->controller= new ErrorController($expressions['Error 404: page not found']."<br /><br />Controller: $controllerClass");
      }
    }
    
    $this->controller->ctrMain($parsedURL);
        
    if ($this->isError)
    {
      $this->error.="<br />Controller: $controllerClass<br />View: ".$this->controller->view."<br />";
      $this->controller = null;
      $this->controller = new ErrorController($this->error);
      $this->controller->ctrMain($parameters);
    }
//     echo ("view = ".$this->controller->view);
//     exit;
    if (!empty($_COOKIE['user_id'])) 
    {
        $fuser = $fuserModel->selectById($_COOKIE['user_id']);
    }
    else
    {
        $fuser = 0;
    }
    
    
    // setting variables of the templae
    $this->data = $this->controller->data;
    $this->data['expressions'] = $expressions;
    $this->data['lang'] = $lang;
    $this->data['fuser'] = $fuser;
    //     if (empty($this->data['path'])) $this->data['path'] = '../';
    
    $this->data['title'] = $this->controller->headr['title'];

    // main template
    $this->view = 'layout';
  }
}  
?>
