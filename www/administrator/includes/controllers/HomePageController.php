<?php
class HomePageController extends Controller
{
  public function ctrMain($parameters)
  {
      global $expressions;
      
      $this->headr['title'] = $expressions['Home page'];
      $this->headr['key_words'] = $expressions['Home'];
      $this->headr['description'] = $expressions['Home page'];
      
      $this->view = 'homePage';
  }
}
?>
