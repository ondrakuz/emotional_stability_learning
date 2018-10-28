<?php
class UsersEditController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected()) {
      $arr = $model->selectOne('users', array ('id' => $id));
      $user = array ('id' => $arr[0], 'jmeno' => $arr[1], 'prijmeni' => $arr[2], 'nick' => $arr[3], 'prava' => $arr[5]);
      $this->header['title'] = "Editace uživatele";
      $this->data['user'] = $user;
      $this->view = 'usersEdit';
    }
  }
}
?>
