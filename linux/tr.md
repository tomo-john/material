# tr
標準出力から文字列を受け取り、変換や削除を行う

=> 引数にファイルを指定することはできない

```
# NG
tr 'a-z' `A-Z` sample.txt

# OK
cat sample.txt | 'a-z' `A-Z`

# もしくは入力リダイレクト
tr `a-z` `A-Z` < sample.txt
```

## 基本的な使い方
```
tr [オプション] セット1 [セット2]
```
- セット1: 変換対象の文字をセット
- セット2: セット1を置換する文字(セット1と同じ長さ)

## 文字の置換
```
echo 'dog' | tr 'd' 'j'
```
`d`が`j`に置換される

```
echo 'dog' | tr 'a-z' 'A-Z'
```
こうすると小文字から大文字に変換できる

## 文字の削除(`-d`オプション)
特定の文字を削除する場合は、`-d`オプションを使用
```
echo 'Hello 0123456789 John!' | tr -d '0-9'
```
数字が消える(数字前後の半角スペースは残る)

## 文字の圧縮(`-s`オプション)
同じ文字が連続する場合に1つに圧縮する時は`-s`
```
echo 'Hello Jooooooooooooooooohn!' | tr -s 'o'
```
連続するoが1つになる(Hello John!)

```
echo 'Hello 0123456789 John!' | tr -d '0-9' | tr -s ' '
```
削除(数字)と圧迫(半角スペース)の組み合わせ

## 使用例
改行をスペースに置換
```
tr '\n' ' ' < file
```
fileから入力リダイレクトを使用、改行を表す`\n`

## 文字列の指定にクラス
`a-z(アルファベット小文字)` は `[:lower:]` のように表現もできる 

| クラス    | 内容                         |
|-----------|------------------------------|
| [:alpha:] | アルファベット(英字)         |
| [:lower:] | アルファベット小文字         |
| [:upper:] | アルファベット大文字         |
| [:digit:] | 数字                         |
| [:alnum:] | アルファベットと数字(英数字) |
| [:space:] | スペース                     |
