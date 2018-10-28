<?php
class UsersAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      if ($tmp = $model->selectOne('users', array('nick' => "'".htmlspecialchars($_POST['nick'])."'"))) 
      {
        // Nick is in db
        RouterController::getInstance()->setError('Uživatel s tímto nickem už existuje. Zkuzte to znovu.');
      }
      else
      {
        // Nick is not in db
        if (($_POST['nick']!='')&&((($_POST['heslo1']!='')&&($_POST['heslo2']!=''))&&($_POST['heslo1']===$_POST['heslo2']))) {
        // Check if data are correct
          if ($_POST['prava']) { $prava=1; };
          if ($_POST['jmeno']=='')  { $jmeno=NULL; } else { $jmeno=$_POST['jmeno']; };
          if ($_POST['prijmeni']=='')  { $prijmeni=NULL; } else { $prijmeni=$_POST['prijmeni']; };
          // and insert in db
          $model->insert('users', array('nick' => htmlspecialchars($_POST['nick'], ENT_QUOTES), 'jmeno' => htmlspecialchars($jmeno, ENT_QUOTES), 'prijmeni' => htmlspecialchars($prijmeni, ENT_QUOTES), 'prava' => $prava, 'heslo' => sha1($_POST['heslo1']) ));
          
          $this->redirect('/administrator/users-overview');
        }
      }
    }
  }
}
?>
