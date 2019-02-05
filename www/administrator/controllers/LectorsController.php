<?php
class LectorsController extends Controller
{
    public function ctrMain($parameters)
    {
        $id = array_shift($parameters);
        
        $studentsModel = new FUsersModel();
        $lectorsModel = new LectorsModel();
        
        $student = $studentsModel->selectById(htmlspecialchars($id, ENT_QUOTES));
        $alectors = $studentsModel->selectLectors(); // all lectors
        $slectors = $lectorsModel->selectByIdS($student['id']); // lectors of this student
        
        $numa = count($alectors);
        for($i = 0; $i < $numa; $i++)
        {
            $alectors[$i]['student'] = 0;
            foreach($slectors as $slector)
            {
                if ($alectors[$i]['id'] == $slector['lector'])
                {
                    $alectors[$i]['student'] = 1;
                }
            }
        }
        
        $this->headr['title'] = "Lektoři uživatele $student[nick]";
        
        $this->data['student'] = $student;
        $this->data['lectors'] = $alectors;
        
        $this->view = 'lectors';

//////////////
// working: //
//////////////
//         $jmeno = 'jmeno1';
//         $$jmeno = 1;
//         echo ($jmeno1);
    }
}
?>
