<?php
class LogoutController extends Controller
{

  public function setView($parameters)
  {}
  
  public function action()
  {
    session_destroy();
    $this->redirect("/administrator/");
  }
}
?>
