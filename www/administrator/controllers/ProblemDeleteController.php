<?php
class ProblemDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($model->update('problem', array('id' => (htmlspecialchars($id, ENT_QUOTES))), array('smazano' => 1)))
      {
        $this->redirect('/administrator/problem-overview');
      }
    }
  }
}
?>
