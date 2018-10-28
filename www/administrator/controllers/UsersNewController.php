<?php
class UsersNewController extends Controller
{
  public function setView($parameters)
  {
    $this->header['title'] = "Nový uživatel";
    $this->view = 'usersNew';
  }
  
  public function action(){}

}
?>
