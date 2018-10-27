<?php
class HomePageController extends Controller
{
  public function setView($parameters)
  {
  // Hlavička stránky
  $this->header['title'] = 'Hlavní stránka';
  // Nastavení šablony
  $this->view = 'homePage';
  }
    
  public function action(){}
}
?>
