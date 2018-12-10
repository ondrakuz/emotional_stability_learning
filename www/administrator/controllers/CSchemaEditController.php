<?php
class CSchemaEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    
    $cschemaModel = new CSchemaModel();
    $langModel = new LanguagesModel();
    
    $languages = $langModel->selectAll();
    
    if ($cschema = $cschemaModel->selectById(htmlspecialchars($id, ENT_QUOTES)))
    {
//       print_r($cschema);
//       exit;
      
      $this->headr['title'] = "Editace kognitivního schematu";
      
      $this->data['cschema'] = $cschema;
      $this->data['langs'] = $languages;
      
      $this->view = 'cschemaEdit';
    }
  }
}
?>
