<?php
class UsersEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $usersModel = new UsersModel();
    $user = $usersModel->selectById(htmlspecialchars($id, ENT_QUOTES));
    if (!empty($user))
    {
      $this->headr['title'] = "Editace uživatele $user[nick]";
      $this->data['user'] = $user;
      $this->view = 'usersEdit';
    }
  }
}
?>
