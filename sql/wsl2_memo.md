# WSL2/Ubuntu

WindowsPCのWSL2/UbuntuにインストールしたPostgreSQLのめも :dog:

## DB名とかユーザー忘れた時

```
# bash
sudo -u posgtres psql # パスワードはロック解除と同じ
```

- `\l`でデータベース一覧を表示する
- `\du`でロール(ユーザー)一覧を表示する

=> 基本DB名・ユーザー名・パスワード同じで作る(SQLとpsql試すだけなので :dog: )

