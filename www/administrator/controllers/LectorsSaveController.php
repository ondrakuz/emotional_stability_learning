<?php
class LectorsSaveController extends Controller
{
    public function ctrMain($parameters)
    {
        $lectorsModel = new LectorsModel();
        $fusersModel = new FUsersModel();
        
        $ids = $_POST['ids'];
        $result = 1;
        
        $lectors = $fusersModel->selectLectors();
        foreach($lectors as $lector)
        {
            $value = $_POST["lector$lector[id]"] ? 1 : 0;
            if (($lectorsModel->selectByKeys($ids, $lector['id'])) && $value == 0)
            {
                $r = $lectorsModel->delete($ids, $lector['id']);
                if ($result != 0) $result = $r;
            }
            else if (!($lectorsModel->selectByKeys($ids, $lector['id'])) && $value == 1)
            {
                $r = $lectorsModel->insert(array ('student' => $ids, 'lector' => $lector['id']));
                if ($result != 0) $result = $r;
            }
        }
        if ($result == 1) 
        {
            $this->redirect('/administrator/fusers-overview');
        }
    }
}
?>
