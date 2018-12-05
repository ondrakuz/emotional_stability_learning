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
                
                if ($idcs)
                {
                    $answer = $answersModel->selectByIds($problems[0]['id'], $idcs);
                    $answers[0] = $answer;
                    $cschema = $cschemaModel->selectById($idcs);
                }
                else
                {
                    $answers = $answersModel->selectByIdP($idp);
                    $cschema['id'] = 0;
                }
                
                $this->headr['title'] = "Test - Problém  \"$problems[0][name]\"";
                $this->headr['key_words'] = "Test, Problém, $problems[0][name]";
                $this->headr['description'] = "Test - Problém \"$problems[0][name]\"";
                
                $this->data['answers'] = $answers;
                $this->data['problem'] = $problems[0];
                $this->data['cschema'] = $cschema;
                
                $this->view = 'learnProblem';
            }
            else
            {
                $idp++;
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
                    $answers = $answersModel->selectByIdP($idp);
                    $numa = count($answers);
                    if (((!$deleted)&&(!empty($answers)))||($idp > ($problems[$num-1]['id']))) break;
                    $idp++;
                } while (1);
                
                if (!$deleted&&($idp < ($problems[$num-1]['id']+1)))
                {
                    $nWrong = $_POST['nWrong'];
                    $nCorrect = $_POST['nCorrect'];
                    if ($_POST['answerCS'] == $idcs)
                    {
                        $nCorrect++;
                    }
                    else
                    {
                        $nWrong++;    
                    }
                    
                    $problem = $problemModel->selectById($idp);
                    shuffle($answers);
                    $cschema = $cschemaModel->selectById($idcs);
                    
                    $this->headr['title'] = "Test - Problém  \"$problem[nazev]\"";
                    $this->headr['key_words'] = "Test, Problém, $problem[nazev]";
                    $this->headr['description'] = "Test - Problém \"$problem[nazev]\"";
                    
                    $this->data['answers'] = $answers;
                    $this->data['problem'] = $problem;
                    $this->data['nWrong'] = $nWrong;
                    $this->data['nCorrect'] = $nCorrect;
                    $this->data['cschema'] = $cschema;
                    
                    $this->view = 'testProblem';
                }
                else
                {
                    $cschema = $cschemaModel->selectById($idcs);
                    $nWrong = $_POST['nWrong'];
                    $nCorrect = $_POST['nCorrect'];
                    if ($_POST['answerCS'] == $idcs)
                    {
                        $nCorrect++;
                    }
                    else
                    {
                        $nWrong++;
                    }
                    
                    $this->data['cschema'] = $cschema;
                    $this->data['nWrong'] = $nWrong;
                    $this->data['nCorrect'] = $nCorrect;
                    
                    $this->headr['title'] = "Test - Výsledky";
                    $this->headr['key_words'] = "Test, Výsledky";
                    $this->headr['description'] = "Výsledky Testu";
                    
                    $this->view = 'testResults';
                }
            }
        }
    }
}
?>
