# find
指定したディレクトリ以下のファイルやディレクトリをリアルタイムで検索する

`locate`と異なり、検索するたびに指定されたディレクトリを直接走査する

=> 広範囲を検索すると時間がかかることがある

=> その代わり`locate`よりもさまざまな条件で細かく検索することが可能

## 基本構文

```
find <検索開始ディレクトリ> <検索条件> <実行するアクション>
```

- <検索開始ディレクトリ>: 検索の開始地点となるディレクトリ
- <検索条件>: ファイル名、ファイルタイプ、サイズ、更新日時など
- <実行アクション>: 通常は見つかったファイルを表示する`-print`がデフォルト

## よく使用する検索条件

1. ファイル名で検索

```
find /home/john/dir1 -name "dog.txt"
```

- `-name`: 指定した名前と完全一致するファイルやディレクトリを検索(大文字小文字区別)
- `-iname`: 大文字小文字を区別せずに検索

2. ファイルタイプで検索

```
find /home/john/dir2 -type f
```

- `f`: 通常ファイル
- `d`: ディレクトリ
- `l`: シンボリックリンク

3. 更新日時で検索

```
find /home/john/dir3 -mtime -7 # 7日以内に更新されたファイル
find /home/john/dir3 -mtime +7 # 7日より前に更新されたファイル
```

- `-mtime`の数字にマイナスをつけると`何日以内`、プラスをつけると`何日より前`

4. ファイルサイズで検索

```
find /home/john/dir4 -size +1M # 1MBより大きいファイル
find /home/john/dir4 -size -1M # 1MBより小さいファイル
```

## 実行アクション

1. 見つかったファイルを表示(デフォルト)

```
# どちらも同じ結果
find /home/john/aaa -name "dog.txt"
find /home/john/aaa -name "dog.txt" -print
```

2. 削除(注意が必要)

```
# 見つかったファイルを削除する
find /home/john/bbb -name "cat.txt" -delete
```

3. コマンドを実行

```
find /home/john/ccc -name "rabbit.txt" -exec ls -l {} \;
```

- `exec`: 見つかったファイルに対して特定のコマンドを実行
- `{}`: 見つかったファイル名が挿入される場所
- `\;`: コマンドの終わりを示す

## 条件の組み合わせ

1. 複数の条件を指定(`-and`もしくはスペースで区切る)

```
find /home/dir -type f -name "*.txt" -size +1M
```
=> 通常ファイルかつ拡張子が`.txt`かつサイズが1MBより大きいファイル

2. 複数の条件のいずれかを満たす(`-or`)

```
find /home/dir -type f -name "*.txt" -or -name "*.md"
```
=> 通常ファイルかつ、拡張子が`.txt`もしくは`.md`のファイル

3. 条件の否定(`-not`または`!`)

```
find /home/dir -type f -not -name ".txt"
```
=> 拡張子が`.txt`以外の通常ファイル

## 複数の条件をグループ化

`\( ... \)`を使用して複数の条件をグループ化することが可能

=> 検索条件を優先的に評価させたり、意図した組み合わせで条件を指定する

例えば、次のような条件を設定する場合:

- 条件1: ファイル名が`.c`もしくは`.h`で終わるファイルを探す
- 条件2: サイズが1MB以上のファイルに絞り込む

```
find /home/john/wk \( -name "*.c" -or -name "*.h" \) -and -size +1M
```

もし`\( ... \)`をつけかった場合: `-name "*.c" -or -name "*.h" -and -size +1M`

この場合は検索条件が順に評価される(`-and`が`-or`よりも優先的に評価される)ので、

`.cで終わるファイル`または`.hで終わるファイルかつサイズが1MB以上のファイル`という検索条件になる
