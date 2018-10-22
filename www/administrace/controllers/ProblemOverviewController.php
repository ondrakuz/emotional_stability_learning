<?php
class ProblemOverviewController extends Controller
{
  public function setView()
  {
    $model = new model();
    if ($model->ifconnected())
    {
      $problems = $model->selectAll("problem");
      
      $this->header['title'] = "Přehled problémů";
      $this->data = array( 'problems' => $problems );
      $this->view = 'problemOverview';
    }
    else
    {
      $this->view = 'error';
    }
  }
}
?>
