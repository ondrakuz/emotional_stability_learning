<?php
class ProblemModel
{
  public function selectAll()
  {
    global $lang;
    $db = DbModel::getInstance();
    $langModel = new LanguagesModel();
    $language = $langModel->selectByTextId("'".htmlspecialchars($lang, ENT_QUOTES)."'");
    
    $problems = $db->selectArray(array ('problem'), array ('*'), array ('id_lang' => $language['id']), 'id asc');
    return $problems;
  }

  public function selectById($id)
  {
    $db = DbModel::getInstance();
    $problem = $db->selectOne('problem', array ('id' => $id));
    return $problem;
  }

  public function insert(array $values)
  {
    $db = DbModel::getInstance();
    return $db->insert('problem', $values);
  }

  public function update($id, array $values)
  {
    $db = DbModel::getInstance();
    return $db->update('problem', array ('id' => $id), $values);
  }

  public function delete($id)
  {
    $db = DbModel::getInstance();
    return $db->update('problem', array ('id' => $id), array ('deleted' => 1));
  }
}
?>
