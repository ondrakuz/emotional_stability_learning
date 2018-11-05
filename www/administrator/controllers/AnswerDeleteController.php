<?php
class AnswerDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $answer = $model->selectOne('answers', array('id' => htmlspecialchars($id, ENT_QUOTES)));
      if($model->update('answers', array('id' => htmlspecialchars($id, ENT_QUOTES)), array('deleted' => 1)))
      {
        $this->redirect('/administrator/answer-overview/'.$answer[1]);
      }
    }
  }
}
?>
