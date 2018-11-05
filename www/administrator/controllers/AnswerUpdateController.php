<?php
class AnswerUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($model->update('answers', array('id' => htmlspecialchars($_POST['id'], ENT_QUOTES)), array('answer' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'id_cog_schema' => htmlspecialchars($_POST['idcs'], ENT_QUOTES))))
      {
        $this->redirect('/administrator/answer-overview/'.$_POST['idp']);
      }
    }
  }
}
?>
