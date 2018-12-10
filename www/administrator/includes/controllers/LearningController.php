<?php
class LearningController extends Controller
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
                
                $this->headr['title'] = "$expressions[Learning] - $expressions[Problem]  \"$problems[0][name]\"";
                $this->headr['key_words'] = "$expressions[Learning], $expressions[Problem], $problems[0][name]";
                $this->headr['description'] = "$expressions[Learning] - $expressions[Problem] \"$problems[0][name]\"";
                
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
                    
                    $this->headr['title'] = "$expressions[Learning] - $expressions[Problem]  \"$problem[name]\"";
                    $this->headr['key_words'] = "$expressions[Learning], $expressions[Problem], $problem[name]";
                    $this->headr['description'] = "$expressions[Learning] - $expressions[Problem] \"$problem[name]\"";
                    
                    $this->data['answers'] = $answers;
                    $this->data['problem'] = $problem;
                    $this->data['cschema'] = $cschema;
                    
                    $this->view = 'learnProblem';
                }
                else
                {
                    $this->data['cschema'] = $cschema;
                    
                    $this->headr['title'] = "$expressions[Learning] - $expressions[End]";
                    $this->headr['key_words'] = "$expressions[Learning], $expressions[End]";
                    $this->headr['description'] = $expressions['End of learning'];
                    
                    $this->view = 'learnEnd';
                }
            }
        }
    }
}
?>
