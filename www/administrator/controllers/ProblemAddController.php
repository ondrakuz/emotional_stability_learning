<?php
class ProblemAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $problemModel = new ProblemModel();
    if ($problemModel->insert(array('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'description' => "'".htmlspecialchars($_POST['description'], ENT_QUOTES)."'", 'id_lang' => $_POST['lang'])))
    {
      $this->redirect('/administrator/problem-overview');
    }
  }
}
?>
