# PHP

`Hypertext Preprocessor`の頭文字を再帰的に略したもので、Web開発でよく使われるプログラミング言語。

- 正式名称: `Hypertxt Preprocessor`
- PHPの最初のPがPHPそのものを指す => `PHP: Hypertext Preprocessor`
- もともとは開発者が作成した`Personal Home Pages Tools`が始まり

PHPは、動的なWebサイトやWebアプリケーション開発に使用される、サーバーサイドのスクリプト言語。

=> サーバーサイドなので、クライアント側(ブラウザなど)でなくWebサーバー上で実行される

HTMLに埋め込むことができ、コンパイル不要で実行が可能。

---

# 基本

PHPをHTMLに埋め込む時は、`<?php ～ ?>`で囲んであげる。

- `<?php`タグを見つけるとそれ以降はPHPとして解釈。
- `?>`タグに到着すると再びHTMLの解釈に戻る。

PHPでは文の末尾に`;`をつけてあげること。

```
<!DOCTYPE html>
<html>
<?php
  echo "じょん";
?>
</html>
```

### 開始タグの終了について

PHPでは、ファイルの内容が純粋なPHPコードのみで、HTMLとの混在がない場合は、末尾の`?>`タグは省略することが推奨されている。

```
<?php
echo "これが推奨される書き方です。"
```

