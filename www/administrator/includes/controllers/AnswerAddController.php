<?php
class AnswerAddController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
      
    $answerModel = new AnswerModel();
    $langModel = new LanguagesModel();
    
    $language = $langModel->selectByTextId("'".$lang."'");
    if ($answerModel->insert(array('answer' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'id_problem' => htmlspecialchars($_POST['idp'], ENT_QUOTES), 'id_cog_schema' => htmlspecialchars($_POST['idcs'], ENT_QUOTES, 'id_lang' => $language['id'])))
    {
      $this->redirect("/$lang/answer-overview/".htmlspecialchars($_POST['idp'], ENT_QUOTES));
    }
  }
}
?>
