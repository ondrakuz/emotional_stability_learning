<?php
class FusersStudentController extends Controller
{
    public function ctrMain($parameters)
    {
        $id = array_shift($parameters);
        
        $fusersModel = new FUsersModel();
        
        $fuser = $fusersModel->selectById(htmlspecialchars($id, ENT_QUOTES));
        $student = $fuser['student'];
        if ($student)
        {
            if ($fusersModel->update(htmlspecialchars($id, ENT_QUOTES), array ('student' => 0)))
            {
                $this->redirect('/administrator/fusers-overview');
            }
        }
        else
        {
            if ($fusersModel->update(htmlspecialchars($id, ENT_QUOTES), array ('student' => 1)))
            {
                $this->redirect('/administrator/fusers-overview');
            }
        }
    }
}
?>
