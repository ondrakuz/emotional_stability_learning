<?php
class ProblemAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('problem', array('name' => htmlspecialchars($this->post_get('name'), ENT_QUOTES), 'description' => htmlspecialchars($this->post_get('description'), ENT_QUOTES)));
      $this->redirect('/problem-overview');
    }
  }
}
?>
