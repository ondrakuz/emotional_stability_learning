<?php
class CSchemaOverviewController extends Controller
{
  public function ctrMain($parameters)
  {
    $cschemaModel = new CSchemaModel();
    if ($cschemas = $cschemaModel->selectAll())
    {
      $this->headr['title'] = "Přehled kognitivních schémat";
      $this->data['cschemas'] = $cschemas;
      $this->view = 'cschemaOverview';
    }
  }
}
?>
