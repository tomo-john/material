### locate
ファイル名検索
```
locate ファイル名パターン
```

`*`や`?`などのメタキャラクタを使用する場合は`''`で囲む
```
locate '*sh*locate'
```

grepと併用して検索結果を絞り込む
```
locate hosts | grep '^/etc'
```

ファイル名データベースを更新する(rootにて)
```
updatedb
```

