<?php
class KSchemaAddController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('kognitivni_schema', array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES)));
      $this->redirect('/administrator/problem-overview/');
    }
  }
  
  public function action(){}

}
?>
