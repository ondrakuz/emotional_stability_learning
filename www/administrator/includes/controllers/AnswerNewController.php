<?php
class AnswerNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $problem = $model->selectOne('problem', array('id' => htmlspecialchars($idp, ENT_QUOTES)));
      $cschemas = $model->selectAll("cog_schema");
      
      $this->headr['title'] = "Vložení nové odpovědi na problém \"".$problem['name']."\"";
      $this->data['problem'] = $problem;
      $this->data['cschemas'] = $cschemas;
      $this->view = 'answerNew';
    }
  }
}
?>
