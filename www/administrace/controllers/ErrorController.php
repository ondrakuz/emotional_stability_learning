<?php
class ErrorController extends Controller
{
  public function __construct($text)
  {
    parent::__construct();
    $this->data['text'] = $text;
  }
  
  public function setView()
  {
  // Hlavička požadavku
  //header("Chyba");
  // Hlavička stránky
  $this->header['title'] = 'Chyba';
  // Nastavení šablony
  $this->view = 'error';
  }
}
?>
