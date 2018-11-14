<?php
class UsersAdminController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $usersModel = new UsersModel();
    $user = $usersModel->selectById(htmlspecialchars($id, ENT_QUOTES));
    $permissions = $user['permissions'];
    if ($id != 1)
    {
      if ($permissions) 
      {
        if ($usersModel->update(htmlspecialchars($id, ENT_QUOTES), array ('permissions' => 0)))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
      else
      {
        if ($usersModel->update(htmlspecialchars($id, ENT_QUOTES), array ('permissions' => 1)))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
    }
    else
    {
      RouterController::getInstance()->setError('Nelze měnit uživatelská oprávnění uživatele \'admin\'.');
    }
  }
}
?>
