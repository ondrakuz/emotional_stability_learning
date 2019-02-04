<?php
class RegistrationViewController extends Controller
{

  public function ctrMain($parameters)
  {
      global $expressions, $lang;
      
      // Hlavička stránky
      $this->headr['title'] = $expressions['Registration'];
      // Nastavení šablony
      $this->view = 'registrationView';
  }
}
?>
