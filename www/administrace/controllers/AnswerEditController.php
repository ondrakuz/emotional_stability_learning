<?php
class AnswerEditController extends Controller
{
  public function setView()
  {
    $model = new model();
    if ($model->ifconnected())
    {
      $answer = $model->selectArray(array("odpoved", 'problem'), array('odpoved', 'nazev', 'id_problemu', 'id_kog_schematu',) , array('problem.id' => $this->post_get('idp'), 'id_problemu' => $this->post_get('idp'), 'id_kog_schematu' => $this->post_get('idks'), 'odpoved.smazano' => 0));
      $kschemas = $model->selectAll("kognitivni_schema");
  		
      $this->header['title'] = "Editace odpovědi na problém \"".$answer['nazev']."\"";
      $this->data['answer'] = $answer;
      $this->data['kschemas'] = $kschemas;
      $this->view = 'answerEdit';
    }
    else
    {
      $this->view = 'error';
    }
  }
}