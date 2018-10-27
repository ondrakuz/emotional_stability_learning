<?php
class KSchemaNewController extends Controller
{
  public function setView($parameters)
  {
    $this->header['title'] = "Nové kognitivní schéma";
    $this->view = 'kschemaNew';
  }
  
  public function action(){}

}
?>
