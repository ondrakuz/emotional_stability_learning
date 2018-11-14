<?php
class ProblemOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $problemModel = new ProblemModel();
    if ($problems = $problemModel->selectAll())
    {
      $this->headr['title'] = "Přehled problémů";
      $this->data = array( 'problems' => $problems );
      $this->view = 'problemOverview';
    }
  }
}
?>
