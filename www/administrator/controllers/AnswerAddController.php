<?php
class AnswerAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($model->insert('answers', array('answer' => htmlspecialchars($_POST['name'], ENT_QUOTES), 'id_problem' => htmlspecialchars($_POST['idp'], ENT_QUOTES), 'id_cog_schema' => htmlspecialchars($_POST['idcs'], ENT_QUOTES))))
      {
        $this->redirect('/administrator/answer-overview/'.htmlspecialchars($_POST['idp'], ENT_QUOTES));
      }
    }
  }
}
?>
