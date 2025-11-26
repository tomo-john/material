<?php
// list.php 一覧表示
require_once 'Dogmon.php';
session_start();

// エラーチェック
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// メッセージ有無
$notices = $_SESSION['notices'] ?? [];
unset($_SESSION['notices']);

// dogmonリスト取得
$dogmons = $_SESSION['dogmon'] ?? [];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <script src="scritp.js"></script>
  <title></title>
</head>

<body>

  <div class="list">
    <h2>dogmon一覧画面🐶</h2>

    <div class="errors">
      <?php if(!empty($errors)): ?>
        <ul>
          <li>エラー:</li>
          <?php foreach($errors as $error): ?>
            <li><?=$error ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="notices">
      <?php if(!empty($notices)): ?>
        <ul>
          <li>メッセージ:</li>
          <?php foreach($notices as $notice): ?>
            <li><?=$notice ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="list_view">
      <table>
        <thead>
          <tr>
            <th>名前</th>
            <th>タイプ</th>
            <th>レベル</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($dogmons)): ?>
            <?php foreach($dogmons as $dogmon): ?>
              <tr>
                <td><?php echo $dogmon->getName(); ?></td>
                <td><?php echo $dogmon->getType(); ?></td>
                <td><?php echo $dogmon->getLevel(); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <p>登録されたdogmonはいません🐶</p>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="back_btn">
    <a class="btn" href="index.php">戻る</a>
  </div>

</body>

</html>
