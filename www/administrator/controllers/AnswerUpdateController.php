<?php
class AnswerUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $answerModel = new AnswerModel();
    if ($answerModel->update(htmlspecialchars($_POST['id'], ENT_QUOTES), array('answer' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'id_problem' => htmlspecialchars($_POST['idp'], ENT_QUOTES), 'id_cog_schema' => htmlspecialchars($_POST['idcs'], ENT_QUOTES), 'id_lang' => $_POST['lang'])))
    {
      $this->redirect('/administrator/answer-overview/'.$_POST['idp']);
    }
  }
}
?>
