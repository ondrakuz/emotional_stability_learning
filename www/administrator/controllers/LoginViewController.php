<?php
class LoginViewController extends Controller
{

  public function ctrMain($parameters)
  {
  // Hlavička stránky
  $this->headr['title'] = 'Přihlášení';
  // Nastavení šablony
  $this->view = 'loginView';
  }
}
?>
