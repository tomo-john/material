### find
リアルタイムでファイルを検索
```
find [検索対象パス] [検索式]
=> 検索対象パスを省略するとカレントディレクトリ以下を対象とする

# 主な検索式
-name     : ファイル名
-size     : ファイルサイズ
-atime    : 最終アクセス日
-amin     : 最終アクセス時刻をxx分前で指定
-mtime    : 最終修正日
-mmin     : 最終更新時刻をxx分前で指定
-perm     : アクセス権
-type     : ファイルタイプ
-maxdepth : 検索の深さを指定
-mindepth : 検索の最小深さを指定
```

/usr/bin 以下のcから始まるファイル名
```
find /usr/bin -name "c*"
```

カレントディレクトリ以下からファイルサイズが10KB以上で

最終アクセス日時が1日以内のファイルを検索
```
find -size -10k -atime -1
```

`-exec` を付与すると検索したファイルに操作を加えることも可能
```
find [検索対象パス] [検索式] -exec [実行コマンド] {} \;
{} : 見つかったファイル名のプレースホルダ
\; : コマンドの終わりを示す
```

1年以上アクセスのないファイルを削除
```
find -atime +366 -exec rm -i {} \;
```

検索したファイルを移動
```
find /tmp -name "*.tmp" -exec mv {} /tmp/old/ \;
```
