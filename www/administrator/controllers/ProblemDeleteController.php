<?php
class ProblemDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $problemModel = new ProblemModel();
    if ($problemModel->delete(htmlspecialchars($id, ENT_QUOTES)))
    {
      $this->redirect('/administrator/problem-overview');
    }
  }
}
?>
