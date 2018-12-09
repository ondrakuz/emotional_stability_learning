<?php
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
      
      $tmp = array_shift($parsedURL);
      $langModel = new LanguagesModel();
      $language = $langModel->selectByTextId("'".htmlspecialchars($lang, ENT_QUOTES)."'");
//       print_r($language);
//       exit;
      if (empty($language)) $this->redirect('/cs'); // if not language in url, redirect to url with deafault language
    
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
        $this->controller= new ErrorController($expressions['Error 404: page not found']);
      }
    }
    
    $this->controller->ctrMain($parsedURL);
        
    if ($this->isError)
    {
      $this->error.="<br /><br />View: ".$this->controller->view."<br /><br />";
      $this->controller = null;
      $this->controller = new ErrorController($this->error);
      $this->controller->ctrMain($parameters);
    }
//     echo ("view = ".$this->controller->view);
//     exit;
    
    // setting variables of the templae
    $this->data = $this->controller->data;
    $this->data['expressions'] = $expressions;
    $this->data['lang'] = $lang;
//     if (empty($this->data['path'])) $this->data['path'] = '../';
    
    $this->data['title'] = $this->controller->headr['title'];

    // main template
    $this->view = 'layout';
  }
}  
?>
