<?php
class CSchemaAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $cschemaModel = new CSchemaModel();
    if ($cschemaModel->insert(array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'")))
    {
      $this->redirect('/administrator/c-schema-overview');
    }
  }
}
?>
