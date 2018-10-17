<?php
class ErrorController extends Controller
{
  public function ErrorController($text)
  {
    $data['text'] = $text;
  }
  
    public function setView()
    {
		// Hlavička požadavku
		header("Chyba");
		// Hlavička stránky
		$this->header['title'] = 'Chyba';
		// Nastavení šablony
		$this->view = 'error';
    }
}
?>
