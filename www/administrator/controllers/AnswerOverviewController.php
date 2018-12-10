<?php
class AnswerOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    
    $answerModel = new AnswerModel();
    $cschemaModel = new CSchemaModel();
    $langModel = new LanguagesModel();
    
    $answers = $answerModel->selectByIdP(htmlspecialchars($idp, ENT_QUOTES));
    $num = count($answers);
    for($i = 0; $i < $num; $i++)
    {
      $cschema = $cschemaModel->selectById($answers[$i]['id_cog_schema']);
      $lang = $langModel->selectById($answers[$i]['id_lang']);
      
      $answers[$i]['name'] = $cschema['name'];
      $answers[$i]['lang_name'] = $lang['name'];
    }
    $problemModel = new ProblemModel();
    $problem = $problemModel->selectById(htmlspecialchars($idp, ENT_QUOTES));
//     exit;
      
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
