# フォームでのSession

Sessionを使って「戻る」でも入力値を保持する3ステップフォーム。

## Sessionの準備

PHPでセッションを付かくには、必ず最初に`session_start();`を記述する。

これを各ステップのPHPファイルの先頭に書く。

```
<?php
session_start(); // セッション開始
?>
```

## form_input.php

- 入力フォーム
- POSTではなくセッションからold値を読込む

```
<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];

// エラーと古い入力をリセット(表示だけ)
unset($_SESSION['errors']);
unset($_SESSION['old']);
?>

<form action="form_confirm.php" method="post">
  <label>ユーザー名:</label>
  <input type="text" name="name"value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>
  <label>メールアドレス:</label>
  <input type="text" name="email"value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br>
  <input type="submit" value="確認">
</form>
```
- `$_SESSION['old']`に以前入力した値が入っていれば表示
- GETパラメータが不要になったのでURLがすっきり

## form_confirm.php

- 入力値を検証
- エラー(未入力)があればSessionに保存して`form_input.php`に戻す

```
<?php
session_start();

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

$errors = [];

if (empty($name)) $errors[] = 'ユーザー名を入力して下さい';
if (empty($email)) $errors[] = 'メールアドレスを入力して下さい';

// エラーがある場合
if (!empty($errors)) {
  $_SESSION['errors'] = $errors;
  $_SESSION['old'] = ['name' => $name, 'email' => $email];
  header("Location: form_input.php");
  exit;
}

// 確認画面表示
$_SESSION['old'] = ['name' => $name, 'email' => $email];
?>

<h3>確認画面</h3>
ユーザー名: <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?><br>
メールアドレス: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?><br>

<form action="form_complete.php" method="post">
  <input type="submit" value="送信">
</form>

<form action="form_input.php" method="get">
  <input type="submit" value="戻る">
</form>
```

- 「戻る」ボタンでも`$_SESSION['old']`から入力値を復元できる
- GETパラメータは不要

## form_complete.php

- 最終的な送信処理(今回はイメージだけ)
- 送信後にセッションをクリアする

```
<?php
session_start();

$name = $_SESSION['old']['name'] ?? '';
$email = $_SESSION['old']['email'] ?? '';

// 本来はここでデータベース保存などの処理

// 送信完了
echo '<h3>送信完了</h3>';
echo 'ユーザー名: ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '<br>';
echo 'メールアドレス: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '<br>';

// セッション削除
unset($_SESSION['old']);
unset($_SESSION['errors']);
?>
```

## メリット

- URLにパラメータが不要
- 入力値が消えずに「戻る」可能
- セキュリティ的にもGETパラメータより安全

