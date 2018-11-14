<?php
class CSchemaDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $cschemaModel = new CSchemaModel();
    if ($cschemaModel->update(htmlspecialchars($id, ENT_QUOTES)))
    {
      $this->redirect('/administrator/c-schema-overview');
    }
  }
}
?>
