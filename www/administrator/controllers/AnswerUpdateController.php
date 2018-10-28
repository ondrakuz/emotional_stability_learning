<?php
class AnswerUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('odpoved', array('id_problemu' => htmlspecialchars($this->post_get('idp'), ENT_QUOTES), 'id_kog_schematu' => htmlspecialchars($this->post_get('idks'), ENT_QUOTES)), array('odpoved' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES)));
      $this->redirect('/administrator/answer-overview/'.htmlspecialchars($this->post_get('idp'), ENT_QUOTES));
    }
  }
}
?>
