# フォーム3ステップ

- `form_input.php` : 入力画面(ユーザー入力)
- `form_confirm.php` : 確認画面(内容確認・戻る)
- `form_done.php` : 完了画面(登録 or 完了表示)

## form_input.php

```
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>test</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h2>フォーム3ステップ</h2>

  <!-- エラーがあれば受け取る -->
  <?php
  $errors = $_GET['errors'] ?? [];
  $old = $_GET['old'] ?? [];
  ?>
  
  <!-- エラーがあったときの処理 -->
  <?php if (!empty($errors)): ?>
    <div style="color:red;">
      <ul>
        <?php foreach ($errors as $e): ?>
          <li><?=htmlspecialchars($e, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <!-- フォーム入力 -->
  <form action="form_confirm.php" method="post">
    <label>ユーザー名:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <label>メールアドレス:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>

    <input type="submit" value="登録">
  </form>
</body>
</html>
```

- ユーザーがフォームに入力する画面
- 「登録」ボタンを押すと、`form_confirm.php`にPOST送信される

## form_confirm.php

```
<?php
// フォームからのデータを受け取る
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

// 未入力チェック
$errors = [];

if (empty($name)) {
  $errors[] = 'ユーザー名を入力して下さい🐶💦';
}
if (empty($email)) {
  $errors[] = 'メールアドレスを入力して下さい🐶💦';
}

// 未入力がある場合は入力画面へ戻す
if (!empty($errors)) {
  $query = http_build_query([
    'errors' => $errors,
    'old' => ['name' => $name, 'email' => $email]
  ]);
  header("Location: form_input.php?$query");
  exit;
}
?>

<h3>登録内容の確認🐶</h3>
<p>ユーザー名:<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8')  ?></p>
<p>メールアドレス:<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8')  ?></p>

<form action="form_done.php" method="post">
  <input type="hidden" name="name" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
  <input type="hidden" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
  <input type="submit" value="送信する🐾">
</form>

<form action="form_input.php" method="get">
  <input type="hidden" name="old[name]" value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>">
  <input type="hidden" name="old[email]" value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
  <input type="submit" value="戻る🐶">
</form>
```

- 入力画面(form_input.php)から送られたデータを受け取り、確認用に画面表示
- 「送信する」ボタン => `form_done.php`へデータを渡す(POST)
- 「戻る」ボタン => `form_input.php`にデータを戻す(GET)
- 未入力時は`$errors`へエラーメッセージ格納・`form_input.php`へリダイレクト

`<input type="hidden" name="old[name] ...">`の`old[name]`はPHP側で連想配列として受け取るための書き方。

ここで、`old['name']`としてしまうと、HTML上では正しく解釈されないので、`old[name]`(シングルクォート不要)でOK。

この`old`は`form_input.php`側でGETから受け取って定義している。

## form_done.php

```
<?php
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

echo '<h3>登録完了🐶✨</h3>';
echo 'ユーザー名: ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '<br>';
echo 'メールアドレス: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '<br><br>';
?>

<input type="button" value="フォームに戻る" onclick="location.href='form_input.php'">
```

- 登録完了画面のみ表示
- 実際はDBへの登録処理や送信処理を行う(ここではカット)

## ポイント

- `<input type="hidden">` : 画面を見せずに値を次のページに渡す

