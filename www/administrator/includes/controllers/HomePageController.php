<?php
class HomePageController extends Controller
{
  public function ctrMain($parameters)
  {
  $this->headr['title'] = 'Úvodní stránka';
  $this->headr['key_words'] = "Úvod";
  $this->headr['description'] = "Úvodní stránka";
  
  $this->view = 'homePage';
  }
}
?>
