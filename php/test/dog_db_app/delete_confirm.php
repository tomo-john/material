<?php
// delete_confirm.php
require_once 'DogRepository.php';

$id = $_POST['id'] ?? '';
if (empty($id)) {
  exit('不正なアクセスです🐶💦');
}

$dogrepo = new DogRepository();
$dog = $dogrepo->findDog(intval($id));

?>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>PHP DB接続🐶</title>
</head>
<body>

  <div class="main">
  
    <h2>PHP DB接続検証APP🐶</h2>

    <h3>CONFIRM</h3>

    <h4>本当に削除してよろしいですか？🐶</h4>

    <div class="confirm">
      <?php echo '削除するワンちゃん: ' . htmlspecialchars($dog['name']) . '(' . htmlspecialchars($dog['age']) . '歳)'; ?>
    </div>

    <div class="form">
      <form action="delete.php" method="post">
        <input name="id" type="hidden" value="<?php echo $dog['id']; ?>">
        <div class="submit-container">
          <input class="link-btn submit-btn" type="submit" value="削除する🐶">
        </div>
      </form>
    </div>
    <div class="menu-list">
      <a class="link-btn" href='list.php'>一覧へ戻る🐶</a>
    </div>

  </div>

</body>
</html>
