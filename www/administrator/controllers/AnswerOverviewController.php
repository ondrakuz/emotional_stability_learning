<?php
class AnswerOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $answerModel = new AnswerModel();
    $answers = $answerModel->selectByIdP(htmlspecialchars($idp, ENT_QUOTES));
    $num = count($answers);
    $cschemaModel = new CSchemaModel();
    for($i = 0; $i < $num; $i++)
    {
      $cschema = $cschemaModel->selectById($answers[$i]['id_problem']);
      $answers[$i]['name'] = $cschema['name'];
    }
    $problemModel = new ProblemModel();
    $problem = $problemModel->selectById(tmlspecialchars($idp, ENT_QUOTES));
    if ($answers && $problem)
    {
      $this->headr['title'] = "Řešení problému \"$problem[name]\"";
      $this->data['answers'] = $answers;
      $this->data['problem'] = $problem;
      $this->view = 'answerOverview';
    }
  }
}
?>
