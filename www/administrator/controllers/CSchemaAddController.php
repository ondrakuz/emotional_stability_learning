<?php
class CSchemaAddController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('cog_schema', array('name' => htmlspecialchars($this->post_get('name'), ENT_QUOTES)));
      $this->redirect('/administrator/c-schema-overview');
    }
  }
}
?>
