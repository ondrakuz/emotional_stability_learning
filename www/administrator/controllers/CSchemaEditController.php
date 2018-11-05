<?php
class CSchemaEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne("cog_schema", array('id' => htmlspecialchars($id, ENT_QUOTES)));
      $cschema = array('id' => $arr[0], 'name' => $arr[1], 'deleted' => $arr[2]);
      print_r($cschema);
      
      $this->headr['title'] = "Editace kognitivního schematu";
      $this->data['cschema'] = $cschema;
      $this->view = 'cschemaEdit';
    }
  }
}
?>
