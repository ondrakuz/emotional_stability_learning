<?php
class ProblemAddController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $model->insert('problem', array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES), 'popis' => htmlspecialchars($this->post_get('popis'), ENT_QUOTES)));
      $this->redirect('/administrator/problem-overview/');
    }
  }
  
  public function action(){}

}
?>
