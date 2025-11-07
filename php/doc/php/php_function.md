# PHP関数

## htmlspecialchars()

HTMLで危険な文字を無害化(エスケープ)するための関数。

```
echo '<script>alert("hi")</script>';
```

これだとJavascritpが動く。(アラートメッセージがポップアップ)

```
echo htmlspecialchars('<scritp>alert("hi")</script>');
```

こうしてあげると`<`, `>`, `"`などの文字列を変換してくれて`<script>`は動作しない。

=> XSS攻撃の対策になる :dog:

### 引数

- 第一引数: エスケープしたい文字(変数もOK)
- 第二引数(省略可): 変換パターン
- 第三引数(省略可): 文字コードの指定(UTF-8)

| 変換パターン | 説明                                         |
|--------------|----------------------------------------------|
| ENT_QUOTES   | ダブル、シングルクォーテーションどちらも変換 |
| ENT_COMPAT   | ダブルクォーテーションのみ変換               |
| ENT_NOQUOTES | ダブルもシングルも変換しない                 |
| ENT_COMPAT   | デフォルト                                   |

参考URL: [公式ドキュメント](https://www.php.net/manual/ja/function.htmlspecialchars.php)

---

## header()

HTTPレスポンスヘッダを送信する関数。

よく使用されるのがページを移動させるリダイレクト。

```
header("Location: from.php");
exit;
```

## http_bulid_query()

配列をURLのクエリ文字列に変換してくれる便利なやつ。

```
<?php
$params = [
  'name' => 'john',
  'email' => 'dog@example.com',
  'tags' => ['php', 'html']
];

echo http_build_query($params);
```

=> `name=john&email=dog%40example.com&tags%5B0%5D=php&tags%5B1%5D=html`

URLの後につけてこんな感じで使える。

```
header("Location: form.php?" . http_build_query($params));
```

| 部分        | 意味                                               |
|-------------|----------------------------------------------------|
| `form.php`  | リダイレクト先のページ                             |
| `?`         | 「これからクエリパラメータを渡します」の印         |
| `$query`    | `http_build_query()` で作られた `key=value` の一覧 |
| `Location:` | HTTPヘッダの「転送先」を指定するキーワード         |

