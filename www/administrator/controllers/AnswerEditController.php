<?php
class AnswerEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $answerModel = new AnswerModel();
    $answer = $answerModel->selectById((htmlspecialchars($id, ENT_QUOTES)));
    $problemModel = new ProblemModel();
    $problem = $problemModel->selectById($answer['id_problem']);
//       print_r($problem);
//       exit;
    $answer['name'] = $problem['name'];
    $cschemaModel = new CSchemaModel();
    $cschemas = $cschemaModel->selectAll();
    if ($answer && $problem && $cschemas)
    {
      $this->headr['title'] = "Editace odpovědi na problém \"".$answer['name']."\"";
      $this->data['answer'] = $answer;
      $this->data['cschemas'] = $cschemas;
      $this->view = 'answerEdit';
    }
  }
}
?>
