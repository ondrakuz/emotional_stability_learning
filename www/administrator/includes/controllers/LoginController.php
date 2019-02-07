<?php
class LoginController extends Controller
{

  public function ctrMain($parameters)
  {
      global $expressions, $lang;
      
      $usersModel = new FUsersModel();
    
      $login_user = htmlspecialchars($_POST['login_user'], ENT_QUOTES);
      $user = $usersModel->selectByNick("'$login_user'");
      if ($user['password']!=sha1($_POST['login_passw']))
      {
//         echo("'".$_POST['login_passw']."'<br />'".$user[4]."'<br />'".sha1($_POST['login_passw'])."'<br /><br />");
//         print_r($user);
//         exit;
        $this->redirect("/$lang/error/login");
      }
      else
      {          
          $time = time()+60*60*24*61;
          setcookie('user_id', $user['id'], $time, '/');
          setcookie('user_student', $user['student'], $time, '/');
          setcookie('user_lector', $user['lector'], $time, '/');
          
          $this->redirect("/$lang");
      }
  }
}
?>
