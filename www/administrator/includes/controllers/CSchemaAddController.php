<?php
class CSchemaAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('cog_schema', array('name' => "'".htmlspecialchars($this->post_get('name'), ENT_QUOTES)."'"));
      $this->redirect('/c-schema-overview');
    }
  }
}
?>
