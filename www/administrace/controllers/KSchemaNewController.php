<?php
class KSchemaNewController extends Controller
{
  public function setView()
  {
    $this->header['title'] = "Nové kognitivní schéma";
    $this->view = 'kschemaNew';
  }
}
