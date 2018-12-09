<?php
class ProblemOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
    
    $problemModel = new ProblemModel();
    $problems = $problemModel->selectAll();

    $this->headr['title'] = $expressions['Problems overview'];
    $this->headr['key_words'] = "$expressions[overview], $expressions[Problems]";
    $this->headr['description'] = $expressions['Problems overview'];
    
    $this->data = array( 'problems' => $problems );
//     $this->data['path'] = '../../';
    
    $this->view = 'problemOverview';
  }
}
?>
