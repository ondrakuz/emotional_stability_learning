<?php
class CSchemaModel
{
  public function selectAll()
  {
    $DbModel = model::getInstance();
    $cog_schemas = $DbModel->selectAll('cog_schema', 'id asc');
    return $cog_schemas;
  }

  public function selectById($id)
  {
    $DbModel = model::getInstance();
    $cog_schema = $DbModel->selectOne('cog_schema', array ('id' => $id));
    return $cog_schema;
  }

  public function insert(array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->insert('cog_schema', $values);
  }

  public function update($id, array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('cog_schema', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('cog_schema', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
