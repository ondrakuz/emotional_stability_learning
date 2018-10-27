<?php
class AnswerOverviewController extends Controller
{
  public function setView($parameters)
  {
    $idp = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $answers = $model->selectArray(array("odpoved", 'kognitivni_schema'), array('odpoved', 'nazev', 'id_problemu', 'id_kog_schematu') , array('id_problemu' => (htmlspecialchars($idp, ENT_QUOTES)), 'id' => 'id_kog_schematu', 'odpoved.smazano' => 0));
      $arr = $model->selectOne("problem", array('id' => (htmlspecialchars($idp, ENT_QUOTES))));
      $problem = $arr[1];
	  	
      $this->header['title'] = "Řešení problému";
      $this->data['answers'] = $answers;
      $this->data['problem'] = $problem;
      $this->view = 'answerOverview';
    }
  }
  
  public function action(){}

}
?>
