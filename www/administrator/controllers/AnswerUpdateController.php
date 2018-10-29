<?php
class AnswerUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($model->update('odpoved', array('id' => htmlspecialchars($_POST['id'], ENT_QUOTES)), array('odpoved' => "'".htmlspecialchars($_POST['nazev'], ENT_QUOTES)."'", 'id_kog_schematu' => htmlspecialchars($_POST['idks'], ENT_QUOTES))))
      {
        $this->redirect('/administrator/answer-overview/'.$_POST['idp']);
      }
    }
  }
}
?>
