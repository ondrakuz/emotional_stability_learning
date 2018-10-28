<?php
class ProblemNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->header['title'] = "Nový problém";
    $this->view = 'problemNew';
  }
}
?>
