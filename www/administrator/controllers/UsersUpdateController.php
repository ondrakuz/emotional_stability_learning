<?php
class UsersUpdateController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if (($_POST['heslo1']!='')||($_POST['heslo2']!='')||($_POST['heslo3']!='')) {
        //Changing password?
        $arr = $model->selectOne('users', array ('id' => $_POST['id']));
        $heslo = $arr[4];
        if ((sha1($_POST['heslo1'])===$heslo)&&(($_POST['heslo2']!='')&&($_POST['heslo3']!=''))&&($_POST['heslo2']===$_POST['heslo3'])) {
          //Yes, changing password
          if ($_POST['jmeno']=='')  { $jmeno=NULL; } else { $jmeno=$_POST['jmeno']; };
          if ($_POST['prijmeni']=='')  { $prijmeni=NULL; } else { $prijmeni=$_POST['prijmeni']; };

          if ($model->update('users', array ('id' => $_POST['id']), array ('jmeno' => "'".htmlspecialchars($_POST['jmeno'])."'", 'prijmeni' => "'".htmlspecialchars($_POST['prijmeni'])."'", 'heslo' => "'".sha1($_POST['heslo2'])."'")))
          { 
            $this->redirect('/administrator/users-overview');
          }
        }else{
          //User input incorrect data
          RouterController::getInstance()->setError('Zřejmě jste zadali špatně jedno z hesel. Zkuste to znovu.');
        };
      }else{
        //Changing only name and surname
        if ($_POST['jmeno']=='')  { $jmeno=NULL; } else { $jmeno=$_POST['jmeno']; };
        if ($_POST['prijmeni']=='')  { $prijmeni=NULL; } else { $prijmeni=$_POST['prijmeni']; };

        if ($model->update('users', array ('id' => $_POST['id']), array ('jmeno' => "'".htmlspecialchars($jmeno)."'", 'prijmeni' => "'".htmlspecialchars($prijmeni)."'")))
        {
          $this->redirect('/administrator/users-overview');
        }
      }
    }
  }
}
?>
