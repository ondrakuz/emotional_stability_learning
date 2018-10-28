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
      $prava = $arr[5];
      if ($prava) 
      {
        if ($model->update('users', array ('id' => htmlspecialchars($id, ENT_QUOTES)), array ('prava' => 0)))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
      else
      {
        if ($model->update('users', array ('id' => htmlspecialchars($id, ENT_QUOTES)), array ('prava' => 1)))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
    }
  }
}
?>
