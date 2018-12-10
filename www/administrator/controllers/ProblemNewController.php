<?php
class ProblemNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $langModel = new LanguagesModel();
    $languages = $langModel->selectAll();
      
    $this->headr['title'] = "Nový problém";
    
    $this->data['langs'] = $languages;
    
    $this->view = 'problemNew';
  }
}
?>
