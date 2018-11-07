<?php
class UsersEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected()) {
      $user = $model->selectOne('users', array ('id' => $id));

      $this->headr['title'] = "Editace uživatele $user[nick]";
      $this->data['user'] = $user;
      $this->view = 'usersEdit';
    }
  }
}
?>
