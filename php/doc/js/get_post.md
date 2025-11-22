# GETとPOST

## サンプル1

### GET

- index.phpのフォーム => ボタンクリック => JS起動(`goGet`関数)
- JSの関数で、パラメータ付きでreceive.phpへリダイレクト

### POST

- index.phpのフォームに隠しフォーム => ボタンクリック => JS起動(`goPost`関数)
- 関数で隠しフォームに値を付与 => submit
- `<form>`, `<input>`タグにidをつけておく

index.php:

```
<?php
// テスト用データ
$get_data = 'じょんゲット';
$post_data = 'じょんポスト';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>GETとPOST🐶(JS)</title>
  <script src="script.js"></script>
</head>
<body>

  <!-- GETフォーム -->
  <h3>GETフォーム🐶</h3>
  <button id="get_btn" onclick="goGet('<?php echo $get_data ?>')">GO GET!</button>

  <hr>

  <!-- POSTフォーム -->
  <h3>POSTフォーム🐶</h3>
  <button id="post_bet" onclick="goPost('<?php echo $post_data?>')">GO POST!!</button>
  <form id="hidden_form" action="receive.php" method="post">
    <input id="hidden_data" type="hidden" name="data">
  </form>

  <hr>

</body>
</html>
```

script.js:

```
function goGet(data) {
  const result = confirm("GETで送信しますか？🐶");
  if (result === true) {
    window.location.href = `receive.php?data=${data}`;
  } else {
    alert("キャンセルしました🐶");
  }
}

function goPost(data) {
  const result = confirm("POSTで送信しますか？🐶");
  if (result === true) {
    document.getElementById('hidden_data').value = data;
    document.getElementById('hidden_form').submit();
  } else {
    alert("キャンセルしました🐶");
  }
}
```

receive.php:

```
<?php 
if (isset($_GET['data'])) {
  $data = $_GET['data'];
}

if (isset($_POST['data'])) {
  $data = $_POST['data'];
}

var_dump($data);

?>
```

### 補足

`<button>`タグの`onclick`でJS関数呼ぶ時に渡す引数が文字列の時は、`'`で囲む。

数値なら囲まなくてもOK。

