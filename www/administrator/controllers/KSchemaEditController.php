<?php
class KSchemaEditController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne("kognitivni_schema", array('id' => $this->post_get('id')));
      $kschema = array('id' => $arr[0], 'nazev' => $arr[1], 'smazano' => $arr[2]);
      
      $this->header['title'] = "Editace kognitivního schematu";
      $this->data['kschema'] = $kschema;
      $this->view = 'kschemaEdit';
    }
  }
  
  public function action(){}

}
?>
