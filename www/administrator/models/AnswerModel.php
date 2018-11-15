<?php
class AnswerModel
{
  public function selectAll()
  {
    $DbModel = model::getInstance();
    $answers = $DbModel->selectAll('answers', 'id asc');
    return $answers;
  }

  public function selectById($id)
  {
    $DbModel = model::getInstance();
    $answer = $DbModel->selectOne('answers', array ('id' => $id));
    return $answer;
  }

  public function selectByIdP($idp)
  {
    $DbModel = model::getInstance();
    $answers = $DbModel->selectArray(array('answers'), array ('*'), array ('id_problem' => $idp), 'id asc');
    return $answers;
  }

  public function insert(array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->insert('answers', $values);
  }

  public function update($id, array $values)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('answers', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $DbModel = model::getInstance();
    return $DbModel->update('answers', array ('id' => $id), array ('deleted' => 1));
  }

}
?>
