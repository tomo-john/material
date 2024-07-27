### head
ファイルの先頭部分だけを表示(デフォルトでは先頭10行)

```
head [-行数] [ファイル名]
```

```
# /etc/passwdファイルの先頭5行を表示
head -5 /etc/passwd

# psコマンドの結果を先頭5桁だけ表示
ps aux | head -5
```


