<?php
class ProblemNewController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
      
    $this->headr['title'] = $expression['New problem'];
    $this->headr['key_words'] = $expression['New problem'];
    $this->headr['description'] = $expression['New problem'];
    
    $this->view = 'problemNew';
  }
}
?>
