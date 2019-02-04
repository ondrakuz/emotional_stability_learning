<?php
class LoginViewController extends Controller
{

  public function ctrMain($parameters)
  {
      global $expressions, $lang;
      
      // Hlavička stránky
      $this->headr['title'] = $expressions['login'];
      // Nastavení šablony
      $this->view = 'loginView';
  }
}
?>
