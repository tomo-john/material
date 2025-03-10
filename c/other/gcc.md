# gcc

C言語のコンパイラ

`.c` ファイルを実行ファイルにコンパイルする

### 基本のコンパイル方法

```
gcc sample.c -o sample
```

`-o` オプションで実行ファイルのファイル名を指定

sample.cファイルがコンパイルされ、`sample`という実行ファイルができる

もし`-o`オプションを付けずにコンパイルすると`a.out`というデフォルトのファイル名で作成される

### 基本の実行方法

実行ファイルがあるディレクトリで実行:

```
./sample
```

### 2つのソースファイルをそれぞれコンパイルして実行モジュールを生成

```
gcc -c sample1.c
gcc -c sample2.c

gcc -o x sample1.o sample2.o
```

### その他オプション

- 警告表示を有効にする
  ```
  gcc -wall sample.c -o sample
  ```

- デバッグ情報を含める
  ```
  gcc -g sample.c -o sample
  ```

- 最適化オプションを使用
  ```
  gcc -O2 sample.c -o sample
  ```

