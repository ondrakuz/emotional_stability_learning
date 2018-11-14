<?php
class UsersAddController extends Controller
{
  public function ctrMain($parameters)
  {
    $usersModel = new UsersModel();
    if ($tmp = $usersModel->selectByNick(htmlspecialchars($_POST['nick'], ENT_QUOTES))) 
    {
      // Nick is in db
      RouterController::getInstance()->setError('Uživatel s tímto nickem už existuje. Zkuzte to znovu.');
    }
    else
    {
      // Nick is not in db
      if (($_POST['nick']!='')&&((($_POST['password1']!='')&&($_POST['password2']!=''))&&($_POST['password1']===$_POST['password2']))) {
      // Check if data are correct
        if ($_POST['permissions']) { $permissions=1; } else { $permissions=0; }
        if ($_POST['name']=='')  { $name=NULL; } else { $name=$_POST['name']; }
        if ($_POST['surname']=='')  { $surname=NULL; } else { $surname=$_POST['surname']; }
        // and insert in db
        $usersModel->insert(array('nick' => "'".htmlspecialchars($_POST['nick'], ENT_QUOTES)."'", 'name' => "'".htmlspecialchars($name, ENT_QUOTES)."'", 'surname' => "'".htmlspecialchars($surname, ENT_QUOTES)."'", 'permissions' => $permissions, 'password' => "'".sha1($_POST['password1'])."'"));
        
        $this->redirect('/administrator/users-overview');
      }
    }
  }
}
?>
