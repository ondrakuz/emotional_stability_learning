<?php
class LogoutController extends Controller
{
    
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $time = time()-1;
        setcookie('user_id', 0, $time, '/');
        setcookie('user_student', 0, $time, '/');
        setcookie('user_lector', 0, $time, '/');
        
        $this->redirect("/$lang");
    }
}
?>
