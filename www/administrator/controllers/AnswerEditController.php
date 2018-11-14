<?php
class AnswerEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $answerModel = new AnswerModel();
    $answer = $answerModel->selectById((htmlspecialchars($id, ENT_QUOTES));
    $problemModel = new ProblemModel();
    $problem = $problemModel->selectById($answer['id_problem']);
//       print_r($problem);
//       exit;
    $answer['name'] = $problem['name'];
    $cschemaModel = new CSchemaModel();
    $cschemas = $cschemaModel->selectAll();
    if ($answer && $problem && $cschemas)
    {
      $answr = $model->selectArray(array("answers", 'problem'), array('answers.id', 'answer', 'name', 'id_problem', 'id_cog_schema',) , array('answers.id' => (htmlspecialchars($id, ENT_QUOTES)), 'id_problem' => 'problem.id', 'answers.deleted' => 0));
      $answer = $answr[0];
      $cschemas = $model->selectAll("cog_schema");
      
      $this->headr['title'] = "Editace odpovědi na problém \"".$answer['name']."\"";
      $this->data['answer'] = $answer;
      $this->data['cschemas'] = $cschemas;
      $this->view = 'answerEdit';
    }
  }
}
?>
