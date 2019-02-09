<?php
class RegistrationController extends Controller
{
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $usersModel = new FUsersModel();
        
        $tmp = $usersModel->selectByNick("'".htmlspecialchars($_POST['nick'], ENT_QUOTES)."'");
//         print_r($tmp);
//         exit;
        if (!empty($tmp))
        {
            // Nick is in db
            RouterController::getInstance()->setError($expressions['User with this nick already exists. Try it again.']);
        }
        else
        {
            if ($_POST['gdpr']) { $gdpr = 1; } else { $gdpr = 0; }
            // Nick is not in db
            if (($_POST['nick']!='')&&((($_POST['password']!='')&&($_POST['password1']!=''))&&($_POST['password']===$_POST['password1']))) {
                if ( $gdpr == 1 )
                {
                    // insert data in db
                    if ($usersModel->insert(array('nick' => "'".htmlspecialchars($_POST['nick'], ENT_QUOTES)."'", 'email' => "'".htmlspecialchars($_POST['email'], ENT_QUOTES)."'", 'password' => "'".sha1($_POST['password'])."'", 'gdpr' => $gdpr)))                
                        $this->redirect("/$lang");
                }
                RouterController::getInstance()->setError($expressions['To successfull registration agreement with storing data is needed.']);
            }
        }
    }
}
?>
