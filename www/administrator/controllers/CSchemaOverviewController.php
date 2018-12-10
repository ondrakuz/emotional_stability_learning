<?php
class CSchemaOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $cschemaModel = new CSchemaModel();
    $langModel = new LanguagesModel();
    
    $result1 = 0;
    if ($cschemas = $cschemaModel->selectA()) $result1 = 1;
    $numCS = count($cschemas);
    $result2 = 1;
    for($i = 0; $i <$numCS; $i++)
    {
        if (!($language = $langModel->selectById($cschemas[$i]['id_lang']))) $result2 = 0;
        $cschemas[$i]['lang'] = $language['name'];
    }
//     echo ("\$result1 = $result1; \$result2 = $result2");
//     exit;
    
    if ($result1 && $result2)
    {
        $this->headr['title'] = "Přehled kognitivních schémat";
        
        $this->data['cschemas'] = $cschemas;
        
        $this->view = 'cschemaOverview';
    }
  }
}
?>
