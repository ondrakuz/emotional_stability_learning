<?php
class ProblemOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $problems = $model->selectAll("problem");
      
      $this->header['title'] = "Přehled problémů";
      $this->data = array( 'problems' => $problems );
      $this->view = 'problemOverview';
    }
  }
}
?>
