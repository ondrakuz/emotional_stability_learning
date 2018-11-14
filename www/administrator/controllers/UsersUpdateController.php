<?php
class UsersUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $usersModel = new UsersModel();
    if (($_POST['password1']!='')||($_POST['password2']!='')||($_POST['password3']!='')) {
      //Changing password?
      $user = $usersModel->selectById($_POST['id']);
      $password = $user['password'];
      if ((sha1($_POST['password1'])===$password)&&(($_POST['password2']!='')&&($_POST['password3']!=''))&&($_POST['password2']===$_POST['password3'])) {
        //Yes, changing password
        if ($_POST['name']=='')  { $name=NULL; } else { $name=$_POST['name']; };
        if ($_POST['surname']=='')  { $surname=NULL; } else { $surname=$_POST['surname']; };

        if ($usersModel->update($_POST['id'], array ('name' => "'".htmlspecialchars($_POST['name'], ENT_QUOTES)."'", 'surname' => "'".htmlspecialchars($_POST['surname'], ENT_QUOTES)."'", 'password' => "'".sha1($_POST['password2'])."'")))
        { 
          $this->redirect('/administrator/users-overview');
        }
      }else{
        //User input incorrect data
        RouterController::getInstance()->setError('Zřejmě jste zadali špatně jedno z hesel. Zkuste to znovu.');
      }
    }else{
      //Changing only name and surname
      if ($_POST['name']=='')  { $name=NULL; } else { $name=$_POST['name']; };
      if ($_POST['surname']=='')  { $surname=NULL; } else { $surname=$_POST['surname']; };

      if ($usersModel->update($_POST['id'], array ('name' => "'".htmlspecialchars($name, ENT_QUOTES)."'", 'surname' => "'".htmlspecialchars($surname, ENT_QUOTES)."'")))
      {
        $this->redirect('/administrator/users-overview');
      }
    }
  }
}
?>
