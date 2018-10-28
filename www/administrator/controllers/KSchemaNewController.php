<?php
class KSchemaNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->header['title'] = "Nové kognitivní schéma";
    $this->view = 'kschemaNew';
  }
}
?>
