<?php
class LoginViewController extends Controller
{

  public function setView($parameters)
  {
  // Hlavička stránky
  $this->header['title'] = 'Přihlášení';
  // Nastavení šablony
  $this->view = 'loginView';
  }
  
  public function action()
  {}
  
}
?>
