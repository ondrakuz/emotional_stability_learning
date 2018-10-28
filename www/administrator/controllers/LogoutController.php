<?php
class LogoutController extends Controller
{

  public function ctrMain($parameters)
  {
    session_destroy();
    $this->redirect("/administrator");
  }
}
?>
