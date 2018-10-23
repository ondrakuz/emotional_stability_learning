<?php
abstract class Controller
{

	// Pole, jehož indexy jsou poté viditelné v šabloně jako běžné proměnné
    protected $data = array();
	// Název šablony bez přípony
    protected $view = "";
	// Hlavička HTML stránky
	protected $header = array('title' => '', 'key_words' => '', 'description' => '');
	
	public function __construct(){}

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
            require("views/" . $this->view.".phtml");
        }
    }
	
	// Přesměruje na dané URL
	public function redirect($url)
	{
		header("Location: ./$url");
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
  
	// Hlavní metoda controlleru
    abstract function setView();
}
?>
