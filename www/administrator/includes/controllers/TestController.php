<?php
class TestController extends Controller
{
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $cschemaModel = new CSchemaModel();
        $problemModel = new ProblemModel();
        $answersModel = new AnswerModel();
        
        $idcs = $_POST['idcs'];
        if (empty($idcs))
        {
            $cschemas = $cschemaModel->selectAll();
            
            $this->headr['title'] = "$expressions[Test] - ".$expressions['Choosing of cognitive schema'];
            $this->headr['key_words'] = "$expressions[Test], ".$expressions['Cognitive schema'];
            $this->headr['description'] = "$expressions[Test] - ".$expressions['Choosing of cognitive schema'];
            
            $this->data['cschemas'] = $cschemas;
            
            $this->view = 'testSchema';
        }
        else
        {
            $idp = $_POST['idp'];
            if (empty($idp))
            {
                $problems = $problemModel->selectAll();
//                 $problem = $problems[0];
                $answers = $answersModel->selectByIdP($problems[0]['id']);
                shuffle($answers);
                $cschema = $cschemaModel->selectById($idcs);
                
                $this->headr['title'] = "$expressions[Test] - $expressions[Problem]  \"$problems[0][name]\"";
                $this->headr['key_words'] = "$expressions[Test], $expressions[Problem], $problems[0][name]";
                $this->headr['description'] = "$expressions[Test] - $expressions[Problem] \"$problems[0][name]\"";
                
                $this->data['answers'] = $answers;
                $this->data['problem'] = $problems[0];
                $this->data['nWrong'] = 0;
                $this->data['nCorrect'] = 0;
                $this->data['cschema'] = $cschema;
                
                $this->view = 'testProblem';
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
                    
                    $this->headr['title'] = "$expressions[Test] - $expressions[Problem]  \"$problem[nazev]\"";
                    $this->headr['key_words'] = "$expressions[Test], $expressions[Problem], $problem[nazev]";
                    $this->headr['description'] = "$expressions[Test] - $expressions[Problem] \"$problem[nazev]\"";
                    
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
                    
                    $this->headr['title'] = "$expressions[Test] - $expressions[Results]";
                    $this->headr['key_words'] = "$expressions[Test], $expressions[Results]";
                    $this->headr['description'] = $expressions['Results of Test'];
                    
                    $this->view = 'testResults';
                }
            }
        }
    }
}
?>
