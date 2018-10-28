<?php
class AnswerEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $idks = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $answr = $model->selectArray(array("odpoved", 'problem'), array('odpoved', 'nazev', 'id_problemu', 'id_kog_schematu',) , array('problem.id' => (htmlspecialchars($idp, ENT_QUOTES)), 'id_problemu' => (htmlspecialchars($idp, ENT_QUOTES)), 'id_kog_schematu' => (htmlspecialchars($idks, ENT_QUOTES)), 'odpoved.smazano' => 0));
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
