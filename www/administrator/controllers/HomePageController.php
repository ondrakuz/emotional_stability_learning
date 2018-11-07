<?php
class HomePageController extends Controller
{
  public function ctrMain($parameters)
  {
  // Hlavička stránky
  $this->headr['title'] = 'Hlavní stránka';
  // Nastavení šablony
  $this->view = 'homePage';
  }
}
?>
