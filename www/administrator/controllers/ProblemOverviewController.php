<?php
class ProblemOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $problemModel = new ProblemModel();
    $langModel = new LanguagesModel();
    
    $result1 = 0;
    if ($problems = $problemModel->selectA()) $result1 = 1;
    $numP = count($problems);
    $result2 = 1;
    for($i = 0; $i <$numP; $i++)
    {
        if (!($language = $langModel->selectById($problems[$i]['id_lang']))) $result2 = 0;
        $problems[$i]['lang'] = $language['name']; 
    }
    
    if ($result1 && $result2)
    {
        $this->headr['title'] = "Přehled problémů";
        
        $this->data['problems'] = $problems;
        
        $this->view = 'problemOverview';
    }
  }
}
?>
