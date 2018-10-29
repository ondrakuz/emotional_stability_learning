<?php
class AnswerAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($model->insert('odpoved', array('odpoved' => htmlspecialchars($_POST['nazev'], ENT_QUOTES), 'id_problemu' => htmlspecialchars($_POST['idp'], ENT_QUOTES), 'id_kog_schematu' => htmlspecialchars($_POST['idks'], ENT_QUOTES))))
      {
        $this->redirect('/administrator/answer-overview/'.htmlspecialchars($_POST['idp'], ENT_QUOTES));
      }
    }
  }
}
?>
