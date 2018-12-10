<?php
class AnswerEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    
    $answerModel = new AnswerModel();
    $problemModel = new ProblemModel();
    $cschemaModel = new CSchemaModel();
    $langModel = new LanguagesModel();
    
    $answer = $answerModel->selectById((htmlspecialchars($id, ENT_QUOTES)));
    $problem = $problemModel->selectById($answer['id_problem']);
//       print_r($problem);
//       exit;
    $answer['name'] = $problem['name'];
    $cschemas = $cschemaModel->selectA();
    $langs = $langModel->selectAll();
    
    if ($answer && $problem && $cschemas)
    {
      $this->headr['title'] = "Editace odpovědi na problém \"".$answer['name']."\"";
      
      $this->data['answer'] = $answer;
      $this->data['cschemas'] = $cschemas;
      $this->data['langs'] = $langs;
      
      $this->view = 'answerEdit';
    }
  }
}
?>
