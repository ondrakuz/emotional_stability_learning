<?php
class AnswerNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne('problem', array('id' => htmlspecialchars($idp, ENT_QUOTES)));
      $problem = array('id' => $arr[0], 'name' => $arr[1], 'description' => $arr[2], 'deleted' => $arr[3]);
      $kschemas = $model->selectAll("cog_schema");
      
      $this->header['title'] = "Editace odpovědi na problém \"".$problem['name']."\"";
      $this->data['problem'] = $problem;
      $this->data['kschemas'] = $kschemas;
      $this->view = 'answerNew';
    }
  }
}
?>
