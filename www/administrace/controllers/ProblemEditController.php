<?php
class ProblemEditController extends Controller
{
  public function setView()
  {
    $model = new model();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne("problem", array('id' => $this->post_get('id')));
      $problem = array('id' => $arr[0], 'nazev' => $arr[1], 'popis' => $arr[2], 'smazano' => $arr[3]);
      
      $this->header['title'] = "Editace problému";
      $this->data['problem'] = $problem;
      $this->view = 'problemEdit';
    }
  }
}
