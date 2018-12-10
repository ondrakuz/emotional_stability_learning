<?php
class AnswerNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $idp = array_shift($parameters);
    
    $problemModel = new ProblemModel();
    $cschemaModel = new CSchemaModel();
    $langModel = new LanguagesModel();
    
    $problem = $problemModel->selectById(htmlspecialchars($idp, ENT_QUOTES));
    $cschemas = $cschemaModel->selectByL($problem['id_lang']);
    $languages = $langModel->selectAll();
    
    if (!empty($problem) && !empty($cschemas))
    {
      $this->headr['title'] = "Vložení nového řešení problému \"".$problem['name']."\"";
      
      $this->data['problem'] = $problem;
      $this->data['cschemas'] = $cschemas;
      $this->data['langs'] = $languages;
      
      $this->view = 'answerNew';
    }
  }
}
?>
