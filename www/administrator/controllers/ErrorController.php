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
  $error = array_shift($parameters);
  if ($error == 'login')
  {
    $this->data['text'] = 'Chyba přihlášení: zadal jste špatné heslo, nebo špatné uživatelské jméno';
  }
  $this->headr['title'] = 'Chyba';
  $this->view = 'error';
  }
}
?>
