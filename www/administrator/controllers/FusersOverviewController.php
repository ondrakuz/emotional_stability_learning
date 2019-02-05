<?php
class FusersOverviewController extends Controller
{
    public function ctrMain($parameters)
    {
        $fusersModel = new FUsersModel();
        if ($fusers = $fusersModel->selectAll())
        {
            $this->headr['title'] = "Studenti a Lektoři";
            
            $this->data['fusers'] = $fusers;
            
            $this->view = 'fUsersOverview';
        }
    }
}
?>
