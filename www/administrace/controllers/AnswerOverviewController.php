<?php
class AnswerOverviewController extends Controller
{
  public function setView()
  {
    $model = new model();
    if ($model->ifconnected())
    {
      $answers = $model->selectArray(array("odpoved", 'kognitivni_schema'), array('odpoved', 'nazev', 'id_kog_schematu') , array('id_problemu' => $this->post_get('idp'), 'id' => 'id_kog_schematu', 'odpoved.smazano' => 0));
      $arr = $model->selectOne("problem", array('id' => $this->post_get('idp')));
      $problem = $arr[1];
	  	
      $this->header['title'] = "Řešení problému";
      $this->data['answers'] = $answers;
      $this->data['problem'] = $problem;
      $this->view = 'answerOverview';
    }
  }
}
