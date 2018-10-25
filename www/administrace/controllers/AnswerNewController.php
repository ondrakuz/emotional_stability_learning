<?php
class AnswerNewController extends Controller
{
  public function setView()
  {
    $model = new model();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne('problem', array('id' => $this->post_get('idp')));
      $problem = array('id' => $arr[0], 'nazev' => $arr[1], 'popis' => $arr[2], 'smazano' => $arr[3]);
      $kschemas = $model->selectAll("kognitivni_schema");
      
      $this->header['title'] = "Editace odpovědi na problém \"".$problem['nazev']."\"";
      $this->data['problem'] = $problem;
      $this->data['kschemas'] = $kschemas;
      $this->view = 'answerNew';
    }
  }
}
?>
