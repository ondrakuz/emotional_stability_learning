<?php
class ErrorController extends Controller
{
  public function __construct($text)
  {
    parent::__construct();
    $this->data['text'] = $text;
  }
  
  public function ctrMain($parameters)
  {
      global $expressions;
      
      $error = array_shift($parameters);
      if ($error == 'login')
      {
        $this->data['text'] = $expressions['Login error: wrong password, or user name'];
      }
      // Hlavička požadavku
    //   header("$expressions[Error]");
      // Hlavička stránky
      $this->headr['title'] = $expressions['Error'];
      $this->headr['key_words'] = $expressions['Error'];
      $this->headr['description'] = $expressions['Error page'];
      // Nastavení šablony
      $this->view = 'error';
  }
}
?>
