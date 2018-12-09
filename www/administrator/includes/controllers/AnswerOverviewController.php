<?php
class AnswerOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
      
    $answerModel = new AnswerModel();
    $cschemaModel = new CSchemaModel();
    
    $idp = array_shift($parameters);
    $answers = $answerModel->selectByIdP(htmlspecialchars($idp, ENT_QUOTES));
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
      $this->headr['title'] = $expressions["Solutions of the problem"]." \"$problem[name]\"";
      $this->headr['key_words'] = "$expressions[Solutions], $expressions[Problem], $problem[name]";
      $this->headr['description'] = $expressions['Solutions of the problem']." \"$problem[name]\"";
      
      $this->data['answers'] = $answers;
      $this->data['problem'] = $problem;
      
      $this->view = 'answerOverview';
    }
  }
}
?>
