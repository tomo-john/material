# bin2hex

バイナリデータを16進表現に変換する。

引数には文字列を指定する。

```
<?php
$hex = bin2hex('Hello, Dog!');

var_dump($hex);
var_dump(hex2bin($hex));
```

### サンプル 

```
session_start();

if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));  // 安全な乱数
}

var_dump($_SESSION);
// =>  array(1) { ["token"]=> string(64) "0d76b2be52b841aa6d6f77df7509453f1ddfb5cbc93f62f5f5a7aca73520e067" }
```

---

## var_dump

変数が持っている情報を全部画面にぶちまけるイメージ。

`dump`は中身をどさっと全部まとめて出すという意味。

`echo`は人間(ユーザー)に見せるための清書的(変数の値だけをキレイに表示)なもの。

`var_dump`は開発者がデバッグなどで使用する感じ。

=> 変数の値だけでなく型や文字数などの情報も表示してくれる

```
$animals = ['dog', 'rabbit', 'bear'];
var_dump($animals); // array(3) { [0]=> string(3) "dog" [1]=> string(6) "rabbit" [2]=> string(4) "bear" }
```

## random_bytes()

安全なランダムデータを作り出す。

OSが持っている予測が困難なランダム性の源を使ってデータを作る。

=> セッショントークンなどで使用される

引数には数値を入れ、数値バイト分のランダムデータを生成する。

`romdom_bytes(32)`で32バイト(32 x 8 = 256ビット)のランダムデータを生成。

そのままだとバイナリで読めないので、`bin2hex`を使用して文字列に変換しトークンなどに使用する。

```
$var_1 = random_bytes(8);
var_dump($var_1); // 文字化けして読めない

$var_2 = bin2hex($var_1);
var_dump($var_2); // 文字列として読める
```

`bin2hex`はバイナリデータ1バイトを16進数の2文字に変換する。

=> `random_bytes(8);`なら16文字、`ramdom_bytes(32);`なら64文字

---

## 公式マニュアル

- [bin2hex](https://www.php.net/manual/ja/function.bin2hex.php)
- [var_dump](https://www.php.net/manual/ja/function.var-dump.php)
- [romdom_bytes](https://www.php.net/manual/ja/function.random-bytes.php)

