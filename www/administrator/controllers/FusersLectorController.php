<?php
class FusersLectorController extends Controller
{
    public function ctrMain($parameters)
    {
        $id = array_shift($parameters);
        
        $fusersModel = new FUsersModel();
        
        $fuser = $fusersModel->selectById(htmlspecialchars($id, ENT_QUOTES));
        $lector = $fuser['lector'];
        if ($lector)
        {
            if ($fusersModel->update(htmlspecialchars($id, ENT_QUOTES), array ('lector' => 0)))
            {
                $this->redirect('/administrator/fusers-overview');
            }
        }
        else
        {
            if ($fusersModel->update(htmlspecialchars($id, ENT_QUOTES), array ('lector' => 1)))
            {
                $this->redirect('/administrator/fusers-overview');
            }
        }
    }
}
?>
