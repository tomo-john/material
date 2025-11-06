# フォーム連携

## HTML側(入力する側)

```
<form action="receive.php" method="POST">
  <label>お名前:</label>
  <input type="text" name="name">
  <input type="submit" value="送信">
</form>
```

ユーザーがフォームに入力して送信すると、ブラウザがデータをPHPに送ってくれる。

## PHP側(受け取る側: receive.php)

```
<?php
$name = $_POST["name"];
echo "こんにちは、{$name}さん</br>";
?>
```

入力した内容が`$name`に入り、画面に表示される。

## ポイント整理

| 要素               | 役割                                            |
|--------------------|-------------------------------------------------|
| `<form>`           | 入力データを送信する範囲を指定                  |
| `action`           | 送信先のPHPファイル名                           |
| `method`           | データの送信方法                                |
| `name属性`         | PHPでデータを受け取るときのキー名               |
| `$_POST` / `$_GET` | 送られてきたデータを受け取るPHPの変数(連想配列) |

## GETとPOSTの違い

| 比較項目         | GET                            | POST                       |
|------------------|--------------------------------|----------------------------|
| データの送信方法 | URLに含める                    | リクエストの本文に含める   |
| URL表示例        | `receive.php?name=tomo`        | URLに表示されない          |
| 特徴             | データが見える(ブックマーク可) | データが見えない(安全)     |
| 主な用途         | 検索フォーム                   | ログインや登録フォームなど |

---

# バリデーション 

## HTML側(varidation.php)

```
<body>
  <h2>お名前を入力してください</h2>
  <form action="check.php" method="post">
    <input type="text" name="name" placeholder="例: tomo">
    <input type="submit" value="Go">
  </form>
</body>
</html>
```

## PHP側(check.php)

```
<?php
$name = $_POST["name"]; // フォームから受け取る

if (empty($name)) {
  echo "名前を入力して下さい🐶";
  echo '<a href="validation.php">戻る</a>';
} else {
  echo "こんにちは、" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "さん🐶</br>";
  echo '<a href="validation.php">戻る</a>';
}
```

## ポイント

| ポイント             | 意味                                             |
|----------------------|--------------------------------------------------|
| `empty($name)`       | 入力が空文字や未入力のときにtrueになる           |
| `htmlspecialchars()` | HTMLの特殊文字を安全に表示する(セキュリティ対策) |
| `ENT_QUOTES`         | シングル・ダブルクォート両方をエスケープする     |
| `'UTF-8'`            | 文字化け防止(エンコーディング指定)               |

---

# 複数項目フォーム

## form.html

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
  <form action="receive.php" method="post">
    <label>名前:</label>
    <input type="text" name="name"><br><br>

    <label>メールアドレス:</label>
    <input type="email" name="email"><br><br>

    <label>メッセージ:</label>
    <textarea name="message" rows="4" cols="40"></textarea><br><br>

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
  echo "<h3>エラーがあります🐶💦<h3>";
  foreach ($errors as $e) {
    echo "・" . htmlspecialchars($e, ENT_QUOTES, 'UTF-8') . "<br>";
  }
} else {
  echo "<h3>送信内容🐶</h3>";
  echo "名前:" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "<br>";
  echo "メール:" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";
  echo "メッセージ:" . nl2br(htmlspecialchars($name, ENT_QUOTES, 'UTF-8')) . "<br>";
}
?>
```

## ポイント

- `filter_var($email, FILTER_VALIDATE_EMAIL)`

  => メールアドレスの形式チェックをしてくれる便利関数

- `htmlspecialchars()`

  => 出力時にHTMLタグが動かないようにエスケープ(XSS対策)

- `nl2br()`

  => メッセージ中の改行を`<br>`に変換して表示

