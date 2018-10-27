<?php
class ProblemNewController extends Controller
{
  public function setView($parameters)
  {
    $this->header['title'] = "Nový problém";
    $this->view = 'problemNew';
  }

  public function action(){}

}
?>
