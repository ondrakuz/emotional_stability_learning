<?php
class AnswerDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $idks = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('odpoved', array('id_problemu' => htmlspecialchars($idp, ENT_QUOTES), 'id_kog_schematu' => htmlspecialchars($idks, ENT_QUOTES)), array('smazano' => 1));
      $this->redirect('/administrator/answer-overview/'.htmlspecialchars($idp, ENT_QUOTES));
    }
  }
}
?>
