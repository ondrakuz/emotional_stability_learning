<?php
class ProblemEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $problem = $model->selectOne("problem", array('id' => $id));
      
      $this->headr['title'] = "Editace problému \"$problem[name]\"";
      $this->data['problem'] = $problem;
      $this->view = 'problemEdit';
    }
  }
}
?>
