### File & Dir
ファイル・ディレクトリ関連

### mkdir
複数階層のディレクトリを作成する時は `-p` オプションをつける
```
mkdir -p aaa/bbb/ccc
```

### gzip / gunzip
GNU Zip(gzip)形式

ディレクトリの圧縮はできない
```
# 圧縮
gzip 'file_name'
=> 元ファイルは残らない
=> .gz のファイルになる
=> 元ファイルを残す場合は -c オプション

# 解凍
gunzip 'file_name'
```

### zip / unzip
zip形式 / ディレクトリの圧縮も可能
```
# 圧縮
gip '圧縮ファイル名' '対象のファイル'
=> 圧縮後のファイル名指定が必要
=> 圧縮後も元ファイルは残る
=> ディレクトリの時は -r オプション
# 解凍
unzip 'file_name'
```

### tar
アーカイブ関連
```
# アーカイブ(圧縮)の作成
tar czvf test.tar.gz test

# 展開(と解凍)
tar xzvf test.tar.gz

# オプション
c : アーカイブの作成
x : アーカイブの展開
z : gzip圧縮(解凍)を使用
v : 詳細を表示
f : アーカイブファイルの指定
```

