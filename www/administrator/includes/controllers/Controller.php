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

abstract class Controller
{

	// Pole, jehož indexy jsou poté viditelné v šabloně jako běžné proměnné
    protected $data = array();
	// Název šablony bez přípony
    protected $view = "";
	// Hlavička HTML stránky
	protected $headr = array('title' => '', 'key_words' => '', 'description' => '');
	protected $siteName;
	protected $protocol;
	
	public function __construct()
	{
        $this->siteName = $_SERVER['SERVER_NAME'];
        if (!empty($_SERVER['HTTPS'])) {
            $this->protocol = 'https';
        }
        else
        {
            $this->protocol = 'http';
        }
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
        extract($this->specialChars($this->data));
        extract($this->data, EXTR_PREFIX_ALL, "");
        require("./administrator/includes/views/" . $this->view.".phtml");
//       require("./views/" . $this->view.".phtml");
    }
  }
	
	// Přesměruje na dané URL
	public function redirect($uri)
	{
		header("Location: ".$this->protocol."://".$this->siteName."$uri");
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
  
  private function specialChars($x = null)
  {
      if (!isset($x))
      {
          return null;
      }
      elseif (is_string($x))
      {
          return htmlspecialchars($x, ENT_QUOTES);
      }
      elseif (is_array($x))
      {
          foreach($x as $k => $v)
          {
              $x[$k] = $this->specialChars($v);
          }
          return $x;
      }
      else return $x;
  }
  
	// Hlavní metoda controlleru
    abstract function ctrMain($parameters);
}
?>
