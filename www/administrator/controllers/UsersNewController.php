<?php
class UsersNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->headr['title'] = "Nový uživatel";
    $this->view = 'usersNew';
  }
}
?>
