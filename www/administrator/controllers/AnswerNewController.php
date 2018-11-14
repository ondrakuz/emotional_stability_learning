<?php
class AnswerNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    $problemModel = new ProblemModel();
    $problem = $problemModel->selectById(htmlspecialchars($idp, ENT_QUOTES));
//       print_r($problem);
//       exit;
    $cschemaModel = new CSchemaModel();
    $cschemas = $cschemaModel->selectAll();
    if ($problem && $cschemas)
    {
      $this->headr['title'] = "Vložení nové odpovědi na problém \"".$problem['name']."\"";
      $this->data['problem'] = $problem;
      $this->data['cschemas'] = $cschemas;
      $this->view = 'answerNew';
    }
  }
}
?>
