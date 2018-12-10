<?php
class CSchemaNewController extends Controller
{
  public function ctrMain($parameters)
  {
      $langModel = new LanguagesModel();
      $languages = $langModel->selectAll();
      
      $this->headr['title'] = "Nové kognitivní schéma";
      
      $this->data['langs'] = $languages;
      
      $this->view = 'cschemaNew';
  }
}
?>
