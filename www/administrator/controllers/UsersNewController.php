<?php
class UsersNewController extends Controller
{
  public function ctrMain($parameters)
  {
    $this->header['title'] = "Nový uživatel";
    $this->view = 'usersNew';
  }
}
?>
