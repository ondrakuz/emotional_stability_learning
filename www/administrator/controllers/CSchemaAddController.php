<?php
class CSchemaAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('cog_schema', array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'"));
      $this->redirect('/administrator/c-schema-overview');
    }
  }
}
?>
