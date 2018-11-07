<?php
class ProblemNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->headr['title'] = "Nový problém";
    $this->view = 'problemNew';
  }
}
?>
