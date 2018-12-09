<?php
class LanguagesModel
{
  public function selectAll()
  {
    $db = DbModel::getInstance();
    $languages = $db->selectAll('languages', 'id asc');
    return $languages;
  }

  public function selectById($id)
  {
    $db = DbModel::getInstance();
    $language = $db->selectOne('languages', array ('id' => $id));
    return $language;
  }

  public function selectByTextId($id)
  {
      $db = DbModel::getInstance();
      $language = $db->selectOne('languages', array ('text_id' => $id));
      return $language;
  }
}
?>
