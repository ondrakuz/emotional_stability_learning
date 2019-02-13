<?php
class ShowResultsController extends Controller
{
    
    public function ctrMain($parameters)
    {
        global $expressions, $lang;
        
        $problemModel = new ProblemModel();
        $answerModel = new AnswerModel();
        
        session_start();
        
        $results = $_SESSION['results'];
        
        $numr = count($results);
        $results_text = "";
        for($i = 0; $i < $numr; $i++)
        {
            $problem = $problemModel->selectById($results[$i]['idp']);
            $results_text .= "<p><strong>".$expressions['Problem'].":</strong> ".$problem['name']."<br />\n";
            if ($results[$i]['ida'] == -1)
            {
                $results_text .= "<strong>".$expressions['Solution'].":</strong> ".$expressions['I can solve this']."</p>\n";
            }
            else
            {
                $answer = $answerModel->selectById($results[$i]['ida']);
                $results_text .= "<strong>".$expressions['Solution'].":</strong> ".$answer['answer']."</p>\n";
            }
        }
        session_destroy();
        
        $this->data['results_text'] = $results_text;
        
        $this->headr['title'] = "$expressions[Learning] - $expressions[Results]";
        $this->headr['key_words'] = "$expressions[Learning], $expressions[Results]";
        $this->headr['description'] = $expressions['Results of learning'];
        
        $this->view = 'showResults';
    }
}
?>
