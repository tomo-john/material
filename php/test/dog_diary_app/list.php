<?php
// list.php 一覧画面
require_once 'DogDiary.php'; 
session_start();

// データ一覧取得
$diaries = DogDiary::getDiaries();

var_dump($diaries);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>🐶犬日記app🐶</title>
</head>
<body>
  
  <div class="main">
    <h2>🐶犬日記app🐶</h2>
    
    <div class="error">
      <?php if(!empty($errors)): ?>
        <ul>
          <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif;?>
    </div>

    <div class="notice">
      <?php if(!empty($notices)): ?>
        <ul>
          <?php foreach($notices as $notice): ?>
            <li><?=$notice ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif;?>
    </div>

    <table>
      <thead>
        <tr>
          <th>タイトル</th>
          <th>作成日時</th>
          <th>アクション</th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>a</td>
          <td>b</td>
        </tr>
      <tbody>
    </table>

      <a class="btn link-btn" href="new.php">作成画面へ🐶</a>
    </form>
  </div>
</body>
</html>
