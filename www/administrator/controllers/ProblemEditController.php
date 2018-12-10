<?php
class ProblemEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    
    $problemModel = new ProblemModel();
    $langModel = new LanguagesModel();
    
    $problem = $problemModel->selectById($id);
    $langs = $langModel->selectAll();
    
    $this->headr['title'] = "Editace problému \"$problem[name]\"";
    
    $this->data['problem'] = $problem;
    $this->data['langs'] = $langs;
    
    $this->view = 'problemEdit';
  }
}
?>
