<?php
class ProblemUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->update('problem', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('name' => htmlspecialchars($this->post_get('name'), ENT_QUOTES), 'description' => htmlspecialchars($this->post_get('description'), ENT_QUOTES)));
      $this->redirect('/administrator/problem-overview');
    }
  }
}
?>
