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
  
  public function setView($parameters)
  {
    $parsedURL = $this->parseURL($parameters[0]);
    
    if (!defined($_SESSION)) // pokud neexistuje, nastartuji session
    {
      session_start();
    }

    if ((empty($parsedURL[1]))&&((empty($_SESSION['user']))&&(empty($_POST['login']))))
    {
      $this->controller = new LoginController();
    }
    else if (($parsedURL[1] == 'login')&&((empty($_SESSION['user']))&&(!(empty($_POST['login'])))))
    {
      $this->controller = new LoginController();
      $this->controller->action();
    }
    else if ((empty($parsedURL[1]))&&(!(empty($_SESSION['user'])))&&((empty($_POST['login']))))
    { 
      $this->controller = new HomePageController();
    }
    else
    {
      // kontroler je 1. parametr URL
      $tmp = array_shift($parsedURL);
      $view = array_shift($parsedURL);
      $controllerClass = $this->camelNotation($view) . 'Controller';
      
      if (file_exists('./controllers/' . $controllerClass . '.php'))
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
        $this->controller= new ErrorController('Error 404: page not found');
      }
    }
    
    if ($controllerClass == 'LogoutController')
    {
      $this->controller->action();
    }
    else
    {
      $this->controller->setView($parsedURL);
    }
        
    if ($this->isError)
    {
      $this->controller = null;
      $this->controller = new ErrorController($this->error);
      $this->controller->setView($parameters);
    }
    
    
    // Nastavení proměnných pro šablonu
    $this->data = $this->controller->data;
    $this->data['title'] = $this->controller->header['title'];

    // Nastavení hlavní šablony
    $this->view = 'layout';
  }
  
  public function action(){}

}  
?>
