<?php
class ProblemUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $problemModel = new ProblemModel();
    if ($problemModel->update(htmlspecialchars($_POST['id'], ENT_QUOTES), array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'description' => "'".htmlspecialchars($_POST['description'], ENT_QUOTES)."'")))
    {
      $this->redirect('/administrator/problem-overview');
    }
  }
}
?>
