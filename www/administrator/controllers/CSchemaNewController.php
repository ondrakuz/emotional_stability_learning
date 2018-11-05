<?php
class CSchemaNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->headr['title'] = "Nové kognitivní schéma";
    $this->view = 'cschemaNew';
  }
}
?>
