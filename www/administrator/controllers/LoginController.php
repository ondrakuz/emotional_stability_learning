<?php
class LoginController extends Controller
{

  public function ctrMain($parameters)
  {
    $usersModel = new UsersModel();
    $login_user = htmlspecialchars($_POST['login_user'], ENT_QUOTES);
    $user = $usersModel->selectByNick("'$login_user'");
    if ($user['password']!=sha1($_POST['login_passw']))
    {
//       echo("'".$_POST['login_passw']."'<br />'".$user[4]."'<br />'".sha1($_POST['login_passw'])."'<br /><br />");
//       print_r($user);
//       exit;
      $this->redirect("/administrator/error/login");
    }
    else
    {
      $_SESSION['id_user']=$user['id'];
      $_SESSION['user']=$login_user;
      $_SESSION['permissions']=$user['permissions'];
      $this->redirect("/administrator");
    }
  }
}
?>
