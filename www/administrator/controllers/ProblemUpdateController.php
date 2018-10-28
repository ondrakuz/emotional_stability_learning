<?php
class ProblemUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('problem', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES), 'popis' => htmlspecialchars($this->post_get('popis'), ENT_QUOTES)));
      $this->redirect('/administrator/problem-overview');
    }
  }
}
?>
