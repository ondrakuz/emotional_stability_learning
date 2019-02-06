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
                $result = $lectorsModel->delete($ids, $lector['id']);
            }
            else if (!($lectorsModel->selectByKeys($ids, $lector['id'])) && $value == 1)
            {
                $result = $lectorsModel->insert(array ('student' => $ids, 'lector' => $lector['id']));
            }
            if ($result == 0) break;
        }
        if ($result == 1) 
        {
            $this->redirect('/administrator/fusers-overview');
        }
    }
}
?>
