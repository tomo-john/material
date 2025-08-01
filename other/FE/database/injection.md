# SQLインジェクション

Webアプリに対して、悪意のあるSQL文を入力し、不正にデータベースを操作(破壊)する攻撃。

Webサイトの入力フォームや検索機能など、ユーザーが入力できる箇所から不正なSQL文を送りこむ。

入力フォームに`' OR '1' == '1`みたいなSQL文を挿入すると...

`SELECT * FROM users WHERE username = 'tomo' AND password = '' OR '1'='1';`みたいにWebアプリ側で解釈され誰でもログインできてしまう。

## 対策方法

### プレースホルダの使用

SQLの可変部分をプレースホルダで指定することで、入力された文字列がSQL文の一部として解釈されるのを防ぐ。

=> SQL文とデータを分離する

### サニタイジング(入力値の無害化)

特殊文字の`'`や`"`や`;`などをエスケープして無効化する。

### バリデーション(入力値の妥当性検証)

数値なら`0-9`だけ、メールなら`@`を含むなど、想定外の文字は排除。

=> SQL構文っぽいものは受け付けない設定

