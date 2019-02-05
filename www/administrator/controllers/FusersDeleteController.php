<?php
class FusersDeleteController extends Controller
{
    public function ctrMain($parameters)
    {
        $id = array_shift($parameters);
        
        $fusersModel = new FUsersModel();
        
        if ($fusersModel->delete(htmlspecialchars($id, ENT_QUOTES)))
        {
            $this->redirect('/administrator/fusers-overview');
        }
    }
}
?>
