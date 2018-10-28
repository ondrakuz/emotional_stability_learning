<?php
class UsersDeleteController extends Controller
{
  public function ctrMain($parameters)
  {
    $id = array_shift($parameters);
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($model->delete('users', array ('id' => $id)))
      {
        $this->redirect('/administrator/users-overview');
      }
    }
  }
}
?>
