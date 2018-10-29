<?php
class AnswerDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $odpoved = $model->selectOne('odpoved', array('id' => htmlspecialchars($id, ENT_QUOTES)));
      if($model->update('odpoved', array('id' => htmlspecialchars($id, ENT_QUOTES)), array('smazano' => 1)))
      {
        $this->redirect('/administrator/answer-overview/'.$odpoved[1]);
      }
    }
  }
}
?>
