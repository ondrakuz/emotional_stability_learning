<?php
class CSchemaModel
{
  public function selectAll()
  {
    $model = model::getInstance();
    $cog_schemas = $model->selectAll('cog_schema', 'id asc');
    return $cog_schemas;
  }

  public function selectById($id)
  {
    $model = model::getInstance();
    $cog_schema = $model->selectOne('cog_schema', array ('id' => $id));
    return $cog_schema;
  }

  public function insert(array $values)
  {
    $model = model::getInstance();
    return $model->insert('cog_schema', $values);
  }

  public function update($id, array $values)
  {
    $model = model::getInstance();
    return $model->update('cog_schema', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $model = model::getInstance();
    return $model->update('cog_schema', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
