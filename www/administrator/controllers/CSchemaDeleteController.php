<?php
class CSchemaDeleteController extends Controller
{
  public function setView($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('cog_schema', array('id' => htmlspecialchars($id, ENT_QUOTES)), array('deleted' => 1));
      $this->redirect('/administrator/c-schema-overview');
    }
  }
  
  public function action(){}

}
?>
