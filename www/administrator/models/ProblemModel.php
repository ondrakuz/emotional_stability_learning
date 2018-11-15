<?php
class ProblemModel
{
  public function selectAll()
  {
    $DbModel = model::getInstance();
    $problems = $DbModel->selectAll('problem', 'id asc');
    return $problems;
  }

  public function selectById($id)
  {
    $DbModel = model::getInstance();
    $problem = $DbModel->selectOne('problem', array ('id' => $id));
    return $problem;
  }

  public function insert(array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->insert('problem', $values);
  }

  public function update($id, array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('problem', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('problem', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
