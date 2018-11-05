<?php
class LoginController extends Controller
{

  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    $login_user = htmlspecialchars($_POST['login_user'], ENT_QUOTES);
    $user = $model->selectOne("users", array( "nick" => "'$login_user'" ));
    if ($user[4]!=sha1($_POST['login_passw']))
    {
//       echo("'".$_POST['login_passw']."'<br />'".$user[4]."'<br />'".sha1($_POST['login_passw'])."'<br /><br />");
//       print_r($user);
//       exit;
      $this->redirect("/administrator/error/login");
    }
    else
    {
      $_SESSION['id_user']=$user[0];
      $_SESSION['user']=$login_user;
      $_SESSION['permissions']=$user[5];
      $this->redirect("/administrator");
    }
  }
}
?>
