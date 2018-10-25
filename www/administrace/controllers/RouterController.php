<?php
class RouterController extends Controller
{
  protected $controller, $error;
  static protected $instance;
  
  public function setError($text)
  {
    $this->error = $text;
  }
  
  public function getError()
  {
    return $this->error;
  }
  
  static public function getInstance()
  {
    if (empty($this->instance)) 
    {
      $this->instance = new RouterController();
    }
    return $this->instance;
  }

  public function setView()
  {
    if($this->post_get('prob'))
    {
      $this->setViewProblem();
    }
    elseif ($this->post_get('kschema'))
    {
      $this->setViewKSchema();
    }
    elseif ($this->post_get('odpovedi'))
    {
      $this->setViewAnswer();
    }
    else
    {
      $this->controller = new HomePageController();
    }
    
    if ($this->controller->getView() == 'error')
    {
      $this->controller = new ErrorController('Nepodařilo se připojit k databázi');
    }
    
    $this->controller->setView();
    // Nastavení proměnných pro šablonu
    $this->data = $this->controller->data;
    $this->data['title'] = $this->controller->header['title'];

    // Nastavení hlavní šablony
    $this->view = 'layout';
  }


  private function setViewProblem()
  {
    if ($this->post_get('prob')==1)
      {
        $this->controller = new ProblemOverviewController();
      }
      elseif ($this->post_get('prob')==2)
      {
        if ($this->post_get('id'))
        {
          $this->controller = new ProblemEditController();
        }
        else
        {
          $this->controller = new ProblemNewController();
        }
      }
      elseif ($this->post_get('prob')==3)
      {
        //SMAZANI PROBLEMU
        $model = new model();
        $model->update('problem', array('id' => (htmlspecialchars($this->post_get('id'), ENT_QUOTES))), array('smazano' => 1));
        $this->redirect('?prob=1');
      }
      elseif ($this->post_get('prob')=='Uložit')
      {
        if ($this->post_get('id'))
        {
          // ZMENA UDAJU V EXISTUJICIM ZAZNAMU PROBLEMU
          $model = new model();
          $model->update('problem', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES), 'popis' => htmlspecialchars($this->post_get('popis'), ENT_QUOTES)));
          $this->redirect('?prob=1');
        }
        else
        {
          // NOVY PROBLEM
          $model = new model();
          $model->insert('problem', array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES), 'popis' => htmlspecialchars($this->post_get('popis'), ENT_QUOTES)));
          $this->redirect('?prob=1');
        }
      }
    }
    
    private function setViewKSchema()
    {
      if ($this->post_get('kschema')==1)
      {
        // PREHLED KOGNITIVNICH SCHEMAT
        $this->controller = new KSchemaOverviewController();
      }
      elseif ($this->post_get('kschema')==2)
      {
        if ($this->post_get('id')) {
          // EDITACE KOGNITIVNIHO SCHEMATU
          $this->controller = new KSchemaEditController();
        }
        else
        {
          // VLOZENI NOVEHO KOGNITIVNIHO SCHEMATU
          $this->controller = new KSchemaNewController();
        }
      }
      elseif ($this->post_get('kschema')==3)
      {
        // SMAZANI KOGNITIVNIHO SCHEMATU
        $model = new model();
        $model->update('kognitivni_schema', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('smazano' => 1));
        $this->redirect('?kschema=1');
      }
      elseif ($this->post_get('kschema')=='Uložit')
      {
        if ($this->post_get('id'))
        {
          // ZMENA UDAJU V EXISTUJICIM ZAZNAMU
          $model = new model();
          $model->update('kognitivni_schema', array('id' => htmlspecialchars($this->post_get('id'), ENT_QUOTES)), array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES)));
          $this->redirect('?kschema=1');
        }
        else
        {
          // NOVE KOGNITIVNI SCHEMA
          $model = new model();
          $model->insert('kognitivni_schema', array('nazev' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES)));
          $this->redirect('?kschema=1');
        }
      }
    }
    
    private function setViewAnswer()
    {
      if ($this->post_get('odpovedi')==1)
      {
       // PREHLED ODPOVEDI DANEHO PROBLEMU
        $this->controller = new AnswerOverviewController();
      }
      elseif ($this->post_get('odpovedi')==2)
      {
        if ($this->post_get('idp')&&$this->post_get('idks'))
        {
          // EDITACE OPOVEDI
        $this->controller = new AnswerEditController();
        }
        elseif (($this->post_get('idp'))&&(!($this->post_get('idks'))))
        {
          // VLOZENI NOVE ODPOVEDI
          $this->controller = new AnswerNewController();
        }
      }
      elseif ($this->post_get('odpovedi')==3)
      {
        //SMAZANI ODPOVEDI
        $model = new model();
        $model->update('odpoved', array('id_problemu' => htmlspecialchars($this->post_get('idp'), ENT_QUOTES), 'id_kog_schematu' => htmlspecialchars($this->post_get('idks'), ENT_QUOTES)), array('smazano' => 1));
        $this->redirect("?odpovedi=1&idp=".$this->post_get('idp'));
      }
      elseif ($this->post_get('odpovedi')=='Uložit')
      {
        if (($this->post_get('idp'))&&($this->post_get('idks')))
        {
          // ZMENA UDAJU V EXISTUJICIM ZAZNAMU
          $model = new model();
          $model->update('odpoved', array('id_problemu' => htmlspecialchars($this->post_get('idp'), ENT_QUOTES), 'id_kog_schematu' => htmlspecialchars($this->post_get('idks'), ENT_QUOTES)), array('odpoved' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES)));
          $this->redirect("?odpovedi=1&idp=".$this->post_get('idp'));
        }
        else
        {
          // NOVA ODPOVED
          $model = new model();
          $model->insert('odpoved', array('odpoved' => htmlspecialchars($this->post_get('nazev'), ENT_QUOTES), 'id_problemu' => htmlspecialchars($this->post_get('idp'), ENT_QUOTES), 'id_kog_schematu' => htmlspecialchars($this->post_get('ksid'), ENT_QUOTES)));
          $this->redirect("?odpovedi=1&idp=".$this->post_get('idp'));
        }
      }
    }
  }  
?>
