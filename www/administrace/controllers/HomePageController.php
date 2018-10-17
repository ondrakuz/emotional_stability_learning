<?php
class HomePageController extends Controller
{
    public function setView()
    {
		// Hlavička požadavku
		header("Hlavní stránka");
		// Hlavička stránky
		$this->header['title'] = 'Hlavní stránka';
		// Nastavení šablony
		$this->view = 'homePage';
    }
}
?>
