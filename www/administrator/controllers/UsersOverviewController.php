<?php
class UsersOverviewController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $users = $model->selectArray(array ("users"), array ("*"), array (), $order = 'id asc');
      
      $this->header['title'] = "Přehled problémů";
      $this->data = array( 'users' => $users );
      $this->view = 'usersOverview';
    }
  }
  
  public function action(){}

}
?>
