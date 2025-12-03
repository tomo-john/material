<?php
// delete.php
require_once 'DogRepository.php';
session_start();

$id = $_POST['id'] ?? '';
$notices = [];

if (empty($id)) {
  die('不正なアクセスです🐶💦');
}

// 更新処理
$dogrepo = new DogRepository();
$dog = $dogrepo->findDog(intval($id));
$result = $dogrepo->deleteDog(intval($id));

if ($result) {
  $notices[] = '削除処理が完了しました🐶✨';
  $notices[] = '削除されたワンちゃん: ' . htmlspecialchars($dog['name']) . '(' . htmlspecialchars($dog['age']) . '歳)';
  $_SESSION['notices'] = $notices;
  header('Location:list.php');
  exit;
} else {
  die('エラー: 更新処理に失敗しました🐶💦');
}
