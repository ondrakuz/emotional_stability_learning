<?php
class CSchemaNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->headr['title'] = "Nové kognitivní schéma";
    $this->headr['key_words'] = "Nové kognitivní schéma";
    $this->headr['description'] = "Nové kognitivní schéma";
    
    $this->view = 'cschemaNew';
  }
}
?>
