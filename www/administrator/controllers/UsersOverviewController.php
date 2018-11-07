<?php
class UsersOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $users = $model->selectArray(array ("users"), array ("*"), array (), $order = 'id asc');
      
      $this->headr['title'] = "Přehled uživatelů";
      $this->data = array( 'users' => $users );
      $this->view = 'usersOverview';
    }
  }
}
?>
