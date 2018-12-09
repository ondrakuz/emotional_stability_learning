<?php
class CSchemaAddController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
      
    $langModel = new LanguagesModel();
    $cschemaModel = new CSchemaModel();
    
    $language = $langModel->selectByTextId("'".$lang."'");
    if ($cschemaModel->insert(array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'id_lang' => "'".$language['id']."'")))
    {
      $this->redirect("/$lang/c-schema-overview");
    }
  }
}
?>
