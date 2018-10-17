<?php
class KSchemaOverviewController extends Controller
{
  public function setView()
  {
    $model = new model();
    if ($model->ifconnected())
    {
      $kschemas = $model->selectAll("kognitivni_schema");
      
      $this->header['title'] = "Přehled kognitivních schémat";
      $this->data['kschemas'] = $kschemas;
      $this->view = 'kschemaOverview';
    }
    else
    {
      $this->view = 'error';
    }
  }
}
