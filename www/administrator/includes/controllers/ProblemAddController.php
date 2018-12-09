<?php
class ProblemAddController extends Controller
{
  public function ctrMain($parameters)
  {
      global $expressions, $lang;
      
      $problemModel = new ProblemModel();
      $langModel = new LanguagesModel();
      
      $language = $langModel->selectByTextId("'".$lang."'");
      if ($problemModel->insert(array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'description' => "'".htmlspecialchars($_POST['description'], ENT_QUOTES)."'", 'id_lang' => $language['id'])))
    {
      $this->redirect("/$lang/problem-overview");
    }
  }
}
?>
