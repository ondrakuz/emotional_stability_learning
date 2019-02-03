<?php
class LearningController extends Controller
{
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $cschemaModel = new CSchemaModel();
        $problemModel = new ProblemModel();
        $answersModel = new AnswerModel();
        
        session_start();
        
        $idcs = $_POST['idcs'];
        $idp = $_POST['idp'];
        $problems = $_SESSION['problems'];
        if (empty($idcs)) //choosing cog. schema
        {
            $cschemas = $cschemaModel->selectAll();
            
            $this->headr['title'] = "$expressions[Learning] - ".$expressions['Choosing of cognitive schema'];
            $this->headr['key_words'] = "$expressions[Learning], ".$expressions['Cognitive schema'];
            $this->headr['description'] = "$expressions[Learning] - ".$expressions['Choosing of cognitive schema'];
            
            $this->data['cschemas'] = $cschemas;
            
            $this->view = 'learningSchema';
        }
        else
        {
            if (empty($idp)) // first problem
            {
                $tmp = $problemModel->selectAll();
                shuffle($tmp);
                $numTmp = count($tmp);
                $i = 0;
                foreach($tmp as $item)
                {
                    if (!$item['deleted'])
                    {
                        if ($idcs<100)
                        {
                            if ($answersModel->selectByIds($item['id'], $idcs))
                            {
                                $problems[$i] = $item;
                                $i++;
                            }
                        }
                        else 
                        {
                            if ($answersModel->selectByIdP($item['id']))
                            {
                                $problems[$i] = $item;
                                $i++;
                            }
                        }
                        if ($i > 9)
                        {
                            break;
                        }
                    }
                }
                $problem = array_shift($problems);
                $_SESSION['problems'] = $problems;
//                 print_r($_SESSION);
//                 exit;
                
                if ($idcs < 100)
                {
//                     print_r($problems);
//                     exit;
                    $answers = $answersModel->selectByIds($problem['id'], $idcs);
                    $cschema = $cschemaModel->selectById($idcs);
                }
                else
                {
//                     print_r($problems);
//                     exit;
                    $answers = $answersModel->selectByIdP($problem['id']);
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
                $this->data['problem'] = $problem;
                $this->data['cschema'] = $cschema;
                
                $this->view = 'learnProblem';
            }
            else 
            {
//                 echo("\n<br /><br />\$idp = $idp<br /><br />\n");
//                 exit;
//                 print_r($_SESSION);
//                 exit;
                if (!empty($_SESSION['problems'])) // next problems
                {
                    $problem = array_shift($_SESSION['problems']);
                    
                    if ($idcs < 100)
                    {
                        $cschema = $cschemaModel->selectById($idcs);
                        $answers = $answersModel->selectByIds($problem['id'], $idcs);
                    }
                    else
                    {
                        $cschema['id'] = 100;
                        $answers = $answersModel->selectByIdP($problem['id']);
                        $numA = count($answers);
                        for( $i = 0; $i < $numA; $i++ )
                        {
                            $cschemaA = $cschemaModel->selectById($answers[$i]['id_cog_schema']);
                            $answers[$i]['name_cog_schema'] = $cschemaA['name'];
                        }
                    }
                
                    $this->headr['title'] = "$expressions[Learning] - $expressions[Problem]  \"$problem[name]\"";
                    $this->headr['key_words'] = "$expressions[Learning], $expressions[Problem], $problem[name]";
                    $this->headr['description'] = "$expressions[Learning] - $expressions[Problem] \"$problem[name]\"";
                    
                    $this->data['answers'] = $answers;
                    $this->data['problem'] = $problem;
                    $this->data['cschema'] = $cschema;
                    
                    $this->view = 'learnProblem';
                }
                else // end of learning
                {
                    session_destroy();
                    
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
