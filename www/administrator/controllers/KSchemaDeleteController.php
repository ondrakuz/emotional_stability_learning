<?php
class KSchemaDeleteController extends Controller
{
  public function setView($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('kognitivni_schema', array('id' => htmlspecialchars($id, ENT_QUOTES)), array('smazano' => 1));
      $this->redirect('/administrator/k-schema-overview');
    }
  }
  
  public function action(){}

}
?>
