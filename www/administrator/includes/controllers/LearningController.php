<?php
class LearningController extends Controller
{
    public function ctrMain($parameters)
    {
        $idcs = $_POST['idcs'];
        $cschemaModel = new CSchemaModel();
        $problemModel = new ProblemModel();
        $answersModel = new AnswerModel();
        
        if (empty($idcs))
        {
            $cschemas = $cschemaModel->selectAll();
            
            $this->headr['title'] = "Test - výběr kognitivního schmématu";
            $this->headr['key_words'] = "Test,kognitivní schméma";
            $this->headr['description'] = "Test - výběr kognitivního schmématu";
            
            $this->data['cschemas'] = $cschemas;
            
            $this->view = 'learningSchema';
        }
        else
        {
            $idp = $_POST['idp'];
            if (empty($idp))
            {
                $problems = $problemModel->selectAll();
                
                if ($idcs < 100)
                {
//                     print_r($problems);
//                     exit;
                    $answers = $answersModel->selectByIds($problems[0]['id'], $idcs);
                    $cschema = $cschemaModel->selectById($idcs);
                }
                else
                {
//                     print_r($problems);
//                     exit;
                    $answers = $answersModel->selectByIdP($problems[0]['id']);
                    $cschema['id'] = 100;
                    $numA = count($answers);
                    for( $i = 0; $i < $numA; $i++)
                    {
                        $cschemaA = $cschemaModel->selectById($answers[$i]['id_cog_schema']);
                        $answers[$i]['name_cog_schema'] = $cschemaA['name'];
                    }
                }
                
                $this->headr['title'] = "Výuka - Problém  \"$problems[0][name]\"";
                $this->headr['key_words'] = "Výuka, Problém, $problems[0][name]";
                $this->headr['description'] = "Výuka - Problém \"$problems[0][name]\"";
                
                $this->data['answers'] = $answers;
                $this->data['problem'] = $problems[0];
                $this->data['cschema'] = $cschema;
                
                $this->view = 'learnProblem';
            }
            else
            {
                $idp++;
//                 echo("\n<br /><br />\$idp = $idp<br /><br />\n");
//                 exit;
                $problems = $problemModel->selectAll();
                $num = count($problems);
                $deleted = true;
                do {
                    for($i = 0; $i < $num; $i++)
                    {
                        if ($problems[$i]['id'] == $idp)
                        {
                            $deleted = false;
                            break;
                        }
                    }
                    
                    if ($idcs < 100)
                    {
                        $answers = $answersModel->selectByIds($idp, $idcs);
                    }
                    else
                    {
                        $answers = $answersModel->selectByIdP($idp);
                    }
                    
                    $numa = count($answers);
                    if (((!$deleted)&&(!empty($answers)))||($idp > ($problems[$num-1]['id']))) break;
                    $idp++;
                } while (1);
                
                if ($idcs < 100)
                {
                    $cschema = $cschemaModel->selectById($idcs);
                }
                else
                {
                    $cschema['id'] = 100;
                    $numA = count($answers);
                    for( $i = 0; $i < $numA; $i++)
                    {
                        $cschemaA = $cschemaModel->selectById($answers[$i]['id_cog_schema']);
                        $answers[$i]['name_cog_schema'] = $cschemaA['name'];
                    }
                }
                
                if (!$deleted&&($idp < ($problems[$num-1]['id']+1)))
                {
                    $problem = $problemModel->selectById($idp);
                    
                    $this->headr['title'] = "Výuka - Problém  \"$problem[name]\"";
                    $this->headr['key_words'] = "Výuka, Problém, $problem[name]";
                    $this->headr['description'] = "Výuka - Problém \"$problem[name]\"";
                    
                    $this->data['answers'] = $answers;
                    $this->data['problem'] = $problem;
                    $this->data['cschema'] = $cschema;
                    
                    $this->view = 'learnProblem';
                }
                else
                {
                    $this->data['cschema'] = $cschema;
                    
                    $this->headr['title'] = "Výuka - konec";
                    $this->headr['key_words'] = "Výuka, konec";
                    $this->headr['description'] = "Konec výuky";
                    
                    $this->view = 'learnEnd';
                }
            }
        }
    }
}
?>
