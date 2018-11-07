<?php
class CSchemaOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $cschemas = $model->selectAll("cog_schema");
      
      $this->headr['title'] = "Přehled kognitivních schémat";
      $this->data['cschemas'] = $cschemas;
      $this->view = 'cschemaOverview';
    }
  }
}
?>
