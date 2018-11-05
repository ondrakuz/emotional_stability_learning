<?php
class CSchemaOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $kschemas = $model->selectAll("cog_schema");
      
      $this->header['title'] = "Přehled kognitivních schémat";
      $this->data['cschemas'] = $cschemas;
      $this->view = 'cschemaOverview';
    }
  }
}
?>
