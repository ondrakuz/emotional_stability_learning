<?php
class ProblemNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->headr['title'] = "Nový problém";
    $this->headr['key_words'] = "Nový problém";
    $this->headr['description'] = "Nový problém";
    
    $this->view = 'problemNew';
  }
}
?>
