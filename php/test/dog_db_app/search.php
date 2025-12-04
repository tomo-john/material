<?php
// search.php
require_once 'DogRepository.php';

$errors = [];
$display_keyword = '';

// データ検索
$keyword = $_GET['keyword'] ?? '';
if (!empty($keyword)) {
  $dogrepo = new DogRepository();
  $result = $dogrepo->searchDog($keyword);
  $display_keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');
}

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

    <h3>SEARCH</h3>

    <?php if(!empty($notices)): ?>
      <div class="notice">
        <ul>
          <?php foreach($notices as $n): ?>
            <li><?=$n ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if(!empty($errors)): ?>
      <div class="error">
        <ul>
          <?php foreach($errors as $e): ?>
            <li><?=$e ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="form">
      <form method="get">
        <label for="keyword">検索: </label>
        <input id="keyword" name="keyword" type="text" placeholder="検索する内容を入力してね🐾" value="<?php echo $display_keyword; ?>">
        <div class="submit-container">
          <input class="link-btn submit-btn" type="submit" value="検索🐶">
        </div>
      </form>
    </div>
    <div class="menu-list">
      <a class="link-btn" href='list.php'>一覧画面へ🐶</a>
      <a class="link-btn" href='index.php'>戻る🐶</a>
    </div>

    <!-- 検索結果があれば表示する -->
    <div class="result">
      <?php if(isset($result) && !empty($result)): ?>
        <p>検索結果:</p>
        <ul>
          <?php foreach($result as $r): ?>
            <li><?php echo htmlspecialchars($r['name']) . '(' . htmlspecialchars($r['age']) . '歳)'; ?></li>
          <?php endforeach; ?>    
        </ul>
      <?php endif; ?>

      <?php if(isset($result) && empty($result)): ?>
          <p>ヒットしませんでした🐶</p>
      <?php endif; ?>
    </div>

  </div>

</body>
</html>
