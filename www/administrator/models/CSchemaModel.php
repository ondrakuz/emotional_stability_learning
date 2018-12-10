<?php
class CSchemaModel
{
    public function selectA()
    {
        $db = DbModel::getInstance();
        $cog_schemas = $db->selectAll('cog_schema', 'id asc');
        return $cog_schemas;
    }
    
    public function selectAll()
    {
        global $lang;
        $db = DbModel::getInstance();
        $langModel = new LanguagesModel();
        $language = $langModel->selectByTextId("'".htmlspecialchars($lang, ENT_QUOTES)."'");
        
        $cog_schemas = $db->selectArray(array ('cog_schema'), array ('*'), array ('id_lang' => $language['id']), 'id asc');
        return $cog_schemas;
    }
    
    public function selectByL($id_lang)
    {
        $db = DbModel::getInstance();
        
        $cog_schemas = $db->selectArray(array ('cog_schema'), array ('*'), array ('id_lang' => $id_lang), 'id asc');
        return $cog_schemas;
    }
    
  public function selectById($id)
  {
    $db = DbModel::getInstance();
    $cog_schema = $db->selectOne('cog_schema', array ('id' => $id));
    return $cog_schema;
  }

  public function insert(array $values)
  {
    $db = DbModel::getInstance();
    return $db->insert('cog_schema', $values);
  }

  public function update($id, array $values)
  {
    $db = DbModel::getInstance();
    return $db->update('cog_schema', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $db = DbModel::getInstance();
    return $db->update('cog_schema', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
