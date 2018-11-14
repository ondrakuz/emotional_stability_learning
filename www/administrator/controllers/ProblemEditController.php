<?php
class ProblemEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $problemModel = new ProblemModel();
    if ($problem = $problemModel->selectById($id))
    {
      $this->headr['title'] = "Editace problému \"$problem[name]\"";
      $this->data['problem'] = $problem;
      $this->view = 'problemEdit';
    }
  }
}
?>
