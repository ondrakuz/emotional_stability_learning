<?php
class AnswerNewController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
      
    $problemModel = new ProblemModel();
    $cschemaModel = new CSchemaModel();
    
    $idp = array_shift($parameters);
    $problem = $problemModel->selectById(htmlspecialchars($idp, ENT_QUOTES));
    $cschemas = $cschemaModel->selectAll();
    if (!empty($problem) && !empty($cschemas))
    {
      $this->headr['title'] = $expressions['Add new solution of the problem']." \"$problem[name]\"";
      $this->headr['key_words'] = "$expressions[Addition], $expressions[Solution], $expressions[Problem], $problem[name]";
      $this->headr['description'] = $expressions['Add new solution of the problem']." \"$problem[name]\"";
      
      $this->data['problem'] = $problem;
      $this->data['cschemas'] = $cschemas;
      
      $this->view = 'answerNew';
    }
  }
}
?>
