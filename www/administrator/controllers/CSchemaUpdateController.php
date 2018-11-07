<?php
class CSchemaUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('cog_schema', array('id' => htmlspecialchars($_POST['id'], ENT_QUOTES)), array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'"));
      $this->redirect('/administrator/c-schema-overview');
    }
  }
  
  public function action(){}

}
?>
