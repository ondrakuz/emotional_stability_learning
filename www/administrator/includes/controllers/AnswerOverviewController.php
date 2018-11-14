<?php
class AnswerOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $answerModel = new AnswerModel();
    $answers = $answerModel->selectByIdP(htmlspecialchars($idp, ENT_QUOTES));
    $cschemaModel = new CSchemaModel();
    $num = count($answers);
    for($i = 0; $i < $num; $i++)
    {
      $cschema = $cschemaModel->selectById($answers[$i]['id_cog_schema']);
      $answers[$i]['name'] = $cschema['name'];
    }
    $problemModel = new ProblemModel();
    $problem = $problemModel->selectById(htmlspecialchars($idp, ENT_QUOTES));
      
    if (!empty($problem))
    {
      $this->headr['title'] = "Řešení problému $problem[name]";
      $this->data['answers'] = $answers;
      $this->data['problem'] = $problem;
      $this->view = 'answerOverview';
    }
  }
}
?>
