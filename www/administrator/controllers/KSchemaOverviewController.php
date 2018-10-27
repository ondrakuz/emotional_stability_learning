<?php
class KSchemaOverviewController extends Controller
{
  public function setView($parameters)
  {
    $model = model::getInstance();
    if ($model->ifconnected())
    {
      $kschemas = $model->selectAll("kognitivni_schema");
      
      $this->header['title'] = "Přehled kognitivních schémat";
      $this->data['kschemas'] = $kschemas;
      $this->view = 'kschemaOverview';
    }
  }
  
  public function action(){}

}
?>
