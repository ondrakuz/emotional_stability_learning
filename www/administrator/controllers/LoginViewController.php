<?php
class LoginViewController extends Controller
{

  public function ctrMain($parameters)
  {
  // Hlavička stránky
  $this->header['title'] = 'Přihlášení';
  // Nastavení šablony
  $this->view = 'loginView';
  }
}
?>
