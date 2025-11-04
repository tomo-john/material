# 変数

変数の名前は必ず`$`から始める。

`echo`で変数の値を画面に出力できる。

文字列の連結は、`.(ドット)`を使用する。

```
<?php
  // これはコメント
  $name = "じょん"; # 文字列
  $age = 2;         # 数値

  // 文字列と変数を「.」で連結する
  echo "私の名前は" . $name . "です。年齢は" . $age . "歳です。";
?>
```

改行するときは`</br>`を改行箇所に記載する。

## サンプルファイル

- 拡張子を任意の名前の`.php`で保存(例: `test.php`)
- 保存した場所で`php -S localhost:8000`を実行し簡易サーバーON
- ブラウザに`http://localhost:8000/`でアクセス可能
- 8000の箇所は任意のポート番号
- [http://localhost:8000/](http://localhost:8000/)

```
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>test</title>
</head>
<body>
  <p>
    <?php
      // コメント🐶
      $name = "じょん";
      $age = 2;
      echo "私の名前は" . $name . "です。</br>";
      echo "年齢は " . $age . " 歳です。</br>";
      echo "私の名前は" . $name . "です。</br>年齢は" . $age . "歳です。";
    ?>
  </p>
</body>
</html>
```

