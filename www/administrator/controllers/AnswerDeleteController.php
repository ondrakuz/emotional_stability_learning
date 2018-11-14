<?php
class AnswerDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $answerModel = new AnswerModel();
    if ($answerModel->delete(htmlspecialchars($id, ENT_QUOTES)))
    {
      $this->redirect('/administrator/answer-overview/'.$answer['id_problem']);
    }
  }
}
?>
