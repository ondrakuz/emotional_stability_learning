<?php
class LoginController extends Controller
{

  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    $login_user=htmlspecialchars($_POST['login_user']);
    list($id_u,$jmeno, $prijmeni, $nick, $heslo,$prava)=$model->selectOne("users", array( "nick" => "'$login_user'" ));//("select id, heslo, prava from users where nick = '$login_user';");
    if ($heslo!=sha1($_POST['login_passw']))
    {
      $this->redirect("/administrator/error/login");
    }
    else
    {
      $_SESSION['id_usera']=$id_u;
      $_SESSION['user']=$login_user;
      $_SESSION['prava']=$prava;
      $this->redirect("/administrator/home-page");
    }
  }
}
?>
