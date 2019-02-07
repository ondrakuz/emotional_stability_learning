<?php
class CSchemaUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $cschemaModel = new CSchemaModel();
    
    if ($_POST['wrong']) { $wrong = 1; } else { $wrong = 0; }
    if ($cschemaModel->update(htmlspecialchars($_POST['id'], ENT_QUOTES), array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'id_lang' => $_POST['lang'], 'wrong' => $wrong)))
    {
      $this->redirect('/administrator/c-schema-overview');
    }
  }
}
?>
