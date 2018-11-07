<?php
abstract class Controller
{

	// Pole, jehož indexy jsou poté viditelné v šabloně jako běžné proměnné
  protected $data = array();
	// Název šablony bez přípony
  protected $view = "";
	// Hlavička HTML stránky
	protected $headr = array('title' => '', 'key_words' => '', 'description' => '');
  protected $siteName;
	
	public function __construct()
	{
    $this->siteName = $_SERVER['SERVER_NAME'];
	}

	public function getView()
	{
	  return $this->view;
	}
	
	// Vyrenderuje pohled
  public function showView()
  {
    if ($this->view)
    {
      extract($this->data);
      require("./administrator/views/" . $this->view.".phtml");
//       require("./views/" . $this->view.".phtml");
    }
  }
	
	// Přesměruje na dané URL
	public function redirect($url)
	{
		header("Location: http://".$this->siteName."$url");
		header("Connection: close");
    exit;
	}

  public function post_get($var)
  {
    if ((isset($_POST["$var"]))||(isset($_GET["$var"]))) {
      if (isset($_POST["$var"])) { return $_POST["$var"]; };
      if (isset($_GET["$var"])) { return $_GET["$var"]; };
    }else { return 0; };
  }
  
	// Hlavní metody controlleru
    abstract function ctrMain($parameters);
}
?>
