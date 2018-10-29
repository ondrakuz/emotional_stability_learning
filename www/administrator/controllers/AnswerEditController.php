<?php
class AnswerEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $answr = $model->selectArray(array("odpoved", 'problem'), array('odpoved.id', 'odpoved', 'nazev', 'id_problemu', 'id_kog_schematu',) , array('odpoved.id' => (htmlspecialchars($id, ENT_QUOTES)), 'id_problemu' => 'problem.id', 'odpoved.smazano' => 0));
      $answer = $answr[0];
      $kschemas = $model->selectAll("kognitivni_schema");
      
      $this->header['title'] = "Editace odpovědi na problém \"".$answer['nazev']."\"";
      $this->data['answer'] = $answer;
      $this->data['kschemas'] = $kschemas;
      $this->view = 'answerEdit';
    }
  }
}
?>
