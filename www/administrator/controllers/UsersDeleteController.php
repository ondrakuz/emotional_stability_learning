<?php
class UsersDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $usersModel = new UsersModel();
    if ($usersModel->delete(htmlspecialchars($id, ENT_QUOTES)))
    {
      $this->redirect('/administrator/users-overview');
    }
  }
}
?>
