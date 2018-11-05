<?php
class CSchemaUpdateController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('cog_schema', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('name' => htmlspecialchars($this->post_get('name'), ENT_QUOTES)));
      $this->redirect('/administrator/c-schema-overview');
    }
  }
  
  public function action(){}

}
?>
