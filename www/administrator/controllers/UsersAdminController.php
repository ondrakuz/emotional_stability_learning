<?php
class UsersAdminController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $arr = $model->selectOne('users', array ('id' => htmlspecialchars($id, ENT_QUOTES)));
      $permissions = $arr['permissions'];
      if ($permissions) 
      {
        if ($model->update('users', array ('id' => htmlspecialchars($id, ENT_QUOTES)), array ('permissions' => 0)))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
      else
      {
        if ($model->update('users', array ('id' => htmlspecialchars($id, ENT_QUOTES)), array ('permissions' => 1)))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
    }
  }
}
?>
