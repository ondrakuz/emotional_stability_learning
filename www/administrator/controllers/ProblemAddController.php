<?php
class ProblemAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('problem', array('name' => htmlspecialchars($_POST['name'], ENT_QUOTES), 'description' => htmlspecialchars($_POST['description'], ENT_QUOTES)));
      $this->redirect('/administrator/problem-overview');
    }
  }
}
?>
