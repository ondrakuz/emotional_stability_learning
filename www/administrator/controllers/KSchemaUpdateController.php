<?php
class KSchemaUpdateController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('kognitivni_schema', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES)));
      $this->redirect('/administrator/k-schema-overview');
    }
  }
  
  public function action(){}

}
?>
