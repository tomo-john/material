# エラーがあってもフォーム入力内容を保持

## form.php

```
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>お問い合わせフォーム</h2>

  <?php
  // 前回の送信エラーがあれば受け取る
  $errors = $_GET['errors'] ?? [];
  $old = $_GET['old'] ?? [];
  ?>

  <?php if (!empty($errors)): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?=htmlspecialchars($e, ENT_QUOTES, 'UTF-8')  ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form action="receive.php" method="post">
    <label>名前:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メールアドレス:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メッセージ:</label>
    <textarea name="message" rows="4" cols="40"><?=htmlspecialchars($old['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea><br><br>

    <input type="submit" value="送信">
  </form>
</body>
</html>
```

## receive.php

```
<?php
// フォームからのデータを受け取る
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// 未入力チェック
$errors = [];

if (empty($name)) {
  $errors[] = "名前を入力して下さい🐶";
}
if (empty($email)) {
  $errors[] = "メールアドレスをを入力して下さい🐶";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "メールアドレスの形式が正しくありません🐶";
}
if (empty($message)) {
  $errors[] = "メッセージを入力して下さい🐶";
}

// 結果の表示
if (!empty($errors)) {
  // エラーがある場合は、入力内容も一緒に戻す
  $query = http_build_query([
    'errors' => $errors,
    'old' => ['name' => $name, 'email' => $email, 'message' => $message]
  ]);
  header("Location: form.php?$query");
  exit;
} 

// 成功時の出力
echo "<h3>送信内容🐶</h3>";
echo "名前:" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "<br>";
echo "メール:" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";
echo "メッセージ:" . nl2br(htmlspecialchars($name, ENT_QUOTES, 'UTF-8')) . "<br>";
```

## ポイント

- `http_build_query()` で配列をクエリ文字列に変換できる！

=> 例: `errors[]=〜&old[name]=〜` という形になる

- `header("Location: ...")` でリダイレクト(再読み込み)

- `$_GET`でその情報を再取得してフォームに再表示

