<?php
class HomePageController extends Controller
{
  public function ctrMain($parameters)
  {
  // Hlavička stránky
  $this->header['title'] = 'Hlavní stránka';
  // Nastavení šablony
  $this->view = 'homePage';
  }
}
?>
