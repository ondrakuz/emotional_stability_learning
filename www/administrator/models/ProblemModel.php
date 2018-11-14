<?php
class ProblemModel
{
  public function selectAll()
  {
    $model = model::getInstance();
    $problems = $model->selectAll('problem', 'id asc');
    return $problems;
  }

  public function selectById($id)
  {
    $model = model::getInstance();
    $problem = $model->selectOne('problem', array ('id' => $id));
    return $problem;
  }

  public function insert(array $values)
  {
    $model = model::getInstance();
    return $model->insert('problem', $values);
  }

  public function update($id, array $values)
  {
    $model = model::getInstance();
    return $model->update('problem', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $model = model::getInstance();
    return $model->update('problem', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
