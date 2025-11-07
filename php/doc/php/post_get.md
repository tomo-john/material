# GETとPOST

HTMLのフォームでデータを送る時、フォームタグの`method`に指定する。

```
<form action="form.php" method="get">
<form action="form.php" method="post">
```

この`method`がGETかPOSTで、データの送られ方・使われ方・安全性が大きく変わる。

## GET

データがURLの末尾(?以降)にくっついて送信される。

=> 例: `form.php?name=john&age=2`

送られたデータはPHPでは、`$_GET['name'], $_GET['age']`で受け取れる。

使う場面としては、検索フォームやページ遷移時のパラメータ渡し、再読み込みしてもOKな場面など。

URLに表示されるため機密情報(パスワードなど)を送るのには向かない。

データ量のは2KB～8KB程度の上限がある。

## POST

データはHTTPの本文(ボディ部分)に含まれて送信される。

URLには何も表示されない。

PHPでは、`$_POST['name']`で受け取れる。

ログインフォームやアンケート送信、データをサーバに登録・変更する操作で使用される。

ページを再読み込みすると「再送信しますか？」って聞かれるやつ。

- GETはページを開く系
- POSTは何かを送る系

## 動作確認用サンプル

```
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>GETとPOSTの違い🐶</title>
</head>
<body>
  <h2>🐾 GETフォーム（URLにデータが表示される）</h2>
  <form action="form_test.php" method="get">
    <label>お名前（GET）: <input type="text" name="name_get"></label>
    <input type="submit" value="送信(GET)">
  </form>

  <h2>🐾 POSTフォーム（データはURLに表示されない）</h2>
  <form action="form_test.php" method="post">
    <label>お名前（POST）: <input type="text" name="name_post"></label>
    <input type="submit" value="送信(POST)">
  </form>

  <hr>

  <h3>📋 結果表示エリア</h3>
  <pre>
  <?php
  echo "【GETデータ】\n";
  print_r($_GET);

  echo "\n【POSTデータ】\n";
  print_r($_POST);
  ?>
  </pre>
</body>
</html>
```
