<?php
class RegistrationViewController extends Controller
{

  public function ctrMain($parameters)
  {
      global $expressions, $lang;
      
      $this->headr['title'] = $expressions['Registration'];
      $this->headr['key_words'] = $expressions['Registration'];
      $this->headr['description'] = $expressions['Registration'];

      $this->view = 'registrationView';
  }
}
?>
