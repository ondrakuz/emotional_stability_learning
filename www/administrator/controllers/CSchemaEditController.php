<?php
class CSchemaEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $cschema = $model->selectOne("cog_schema", array('id' => htmlspecialchars($id, ENT_QUOTES)));
//       print_r($cschema);
//       exit;
      
      $this->headr['title'] = "Editace kognitivního schematu";
      $this->data['cschema'] = $cschema;
      $this->view = 'cschemaEdit';
    }
  }
}
?>
