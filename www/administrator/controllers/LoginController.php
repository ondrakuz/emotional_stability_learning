<?php
class LoginController extends Controller
{

  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    $login_user=htmlspecialchars($_POST['login_user']);
    $user=$model->selectOne("users", array( "nick" => "'$login_user'" ));//("select id, heslo, prava from users where nick = '$login_user';");
    if ($user['password']!=sha1($_POST['login_passw']))
    {
      $this->redirect("/administrator/error/login");
    }
    else
    {
      $_SESSION['id_user']=$user['id'];
      $_SESSION['user']=$login_user;
      $_SESSION['permissions']=$user['permissions'];
      $this->redirect("/administrator/home-page");
    }
  }
}
?>
