<?php
class CSchemaEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $cschemaModel = new CSchemaModel();
    if ($cschema = $cschemaModel->selectById(htmlspecialchars($id, ENT_QUOTES)))
    {
//       print_r($cschema);
//       exit;
      
      $this->headr['title'] = "Editace kognitivního schematu";
      $this->data['cschema'] = $cschema;
      $this->view = 'cschemaEdit';
    }
  }
}
?>
