<?php
class ProblemNewController extends Controller
{
  public function setView()
  {
    $this->header['title'] = "Nový problém";
    $this->view = 'problemNew';
  }
}
