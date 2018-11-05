<?php
class AnswerOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $answers = $model->selectArray(array("answers", 'cog_schema'), array('answers.id', 'answer', 'name', 'id_problem', 'id_cog_schema') , array('id_problem' => (htmlspecialchars($idp, ENT_QUOTES)), 'cog_schema.id' => 'id_cog_schema', 'answers.deleted' => 0));
      $arr = $model->selectOne("problem", array('id' => (htmlspecialchars($idp, ENT_QUOTES))));
      $problem = $arr[1];
	  	
      $this->header['title'] = "Řešení problému";
      $this->data['answers'] = $answers;
      $this->data['problem'] = $problem;
      $this->view = 'answerOverview';
    }
  }
}
?>
