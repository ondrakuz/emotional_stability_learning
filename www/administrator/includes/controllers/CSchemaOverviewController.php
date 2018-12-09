<?php
class CSchemaOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    global $expressions, $lang;
    
    $cschemaModel = new CSchemaModel();
    $cschemas = $cschemaModel->selectAll();
    
    $this->headr['title'] = $expressions['Cognitive schemas overview'];
    $this->headr['key_words'] = "$expressions[Overview], ".$expressions['Cognitive schemas'];
    $this->headr['description'] = $expressions['Cognitive schemas overview'];
    
    $this->data['cschemas'] = $cschemas;
    
    $this->view = 'cschemaOverview';
  }
}
?>
