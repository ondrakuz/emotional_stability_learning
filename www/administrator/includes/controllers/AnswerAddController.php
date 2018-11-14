<?php
class AnswerAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $answerModel = new AnswerModel();
    if ($answerModel->insert(array('answer' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'id_problem' => htmlspecialchars($_POST['idp'], ENT_QUOTES), 'id_cog_schema' => htmlspecialchars($_POST['idcs'], ENT_QUOTES))))
    {
      $this->redirect('/answer-overview/'.htmlspecialchars($_POST['idp'], ENT_QUOTES));
    }
  }
}
?>
