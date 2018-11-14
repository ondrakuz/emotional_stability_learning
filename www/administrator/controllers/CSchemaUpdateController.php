<?php
class CSchemaUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $cschemaModel = new CSchemaModel();
    if ($cschemaModel->update(htmlspecialchars($_POST['id'], ENT_QUOTES), array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'")))
    {
      $this->redirect('/administrator/c-schema-overview');
    }
  }
}
?>
