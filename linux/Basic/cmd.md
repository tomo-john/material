### command & path

bashの主な組み込みコマンド
```
alisa   : エイリアスの作成・表示
bg      : ジョブをバックグラウンドで実行
cd      : ディレクトリ移動
echo    : 引数の内容を表示
exit    : シェルの終了
export  : 環境変数の設定
fg      : ジョブをフォアグラウンドで実行
history : コマンド履歴表示
jobs    : ジョブを表示
kill    : プロセスにシグナルを表示
pwd     : カレントディレクトリを表示
unalias : エイリアスの削除
```

外部コマンドはシェルの外部に同じ名前の実行プログラムとして保存されている

`which` コマンドで実行ファイルの場所を確認できる

```
which ls # => /usr/bin/ls
```

コマンドが入力されるとシェルは変数`PATH`に格納されているディレクトリの中を

全て検索し、コマンド名に一致する実行ファイルを見つけたらそれを実行する

=> コマンドサーチパス or パスという

