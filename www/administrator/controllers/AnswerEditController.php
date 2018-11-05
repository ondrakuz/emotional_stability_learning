<?php
class AnswerEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $answr = $model->selectArray(array("answers", 'problem'), array('answers.id', 'answer', 'nazev', 'id_problem', 'id_cog_schema',) , array('answers.id' => (htmlspecialchars($id, ENT_QUOTES)), 'id_problem' => 'problem.id', 'answers.deleted' => 0));
      $answer = $answr[0];
      $cschemas = $model->selectAll("kognitivni_schema");
      
      $this->header['title'] = "Editace odpovědi na problém \"".$answer['nazev']."\"";
      $this->data['answer'] = $answer;
      $this->data['cschemas'] = $cschemas;
      $this->view = 'answerEdit';
    }
  }
}
?>
