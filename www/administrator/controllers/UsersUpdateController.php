<?php
class UsersUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if (($_POST['password1']!='')||($_POST['password2']!='')||($_POST['password3']!='')) {
        //Changing password?
        $arr = $model->selectOne('users', array ('id' => $_POST['id']));
        $password = $arr[4];
        if ((sha1($_POST['password1'])===$password)&&(($_POST['password2']!='')&&($_POST['password3']!=''))&&($_POST['password2']===$_POST['password3'])) {
          //Yes, changing password
          if ($_POST['name']=='')  { $name=NULL; } else { $name=$_POST['name']; };
          if ($_POST['surname']=='')  { $surname=NULL; } else { $surname=$_POST['surname']; };

          if ($model->update('users', array ('id' => $_POST['id']), array ('name' => "'".htmlspecialchars($_POST['name'])."'", 'surname' => "'".htmlspecialchars($_POST['surname'])."'", 'password' => "'".sha1($_POST['password2'])."'")))
          { 
            $this->redirect('/administrator/users-overview');
          }
        }else{
          //User input incorrect data
          RouterController::getInstance()->setError('Zřejmě jste zadali špatně jedno z hesel. Zkuste to znovu.');
        };
      }else{
        //Changing only name and surname
        if ($_POST['name']=='')  { $name=NULL; } else { $name=$_POST['name']; };
        if ($_POST['surname']=='')  { $surname=NULL; } else { $surname=$_POST['surname']; };

        if ($model->update('users', array ('id' => $_POST['id']), array ('name' => "'".htmlspecialchars($name)."'", 'surname' => "'".htmlspecialchars($surname)."'")))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
    }
  }
}
?>
