<?php
class KSchemaEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne("kognitivni_schema", array('id' => htmlspecialchars($id, ENT_QUOTES)));
      $kschema = array('id' => $arr[0], 'nazev' => $arr[1], 'smazano' => $arr[2]);
      print_r($kschema);
      
      $this->header['title'] = "Editace kognitivního schematu";
      $this->data['kschema'] = $kschema;
      $this->view = 'kschemaEdit';
    }
  }
}
?>
