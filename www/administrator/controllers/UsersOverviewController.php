<?php
class UsersOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $usersModel = new UsersModel();
    if ($users = $usersModel->selectAll())
    {
      $this->headr['title'] = "Přehled uživatelů";
      $this->data = array( 'users' => $users );
      $this->view = 'usersOverview';
    }
  }
}
?>
