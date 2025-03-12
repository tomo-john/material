# memo

## xargs

```
# file.txtに記述されているファイルが作成(touch)される
cat file.txt | xargs touch

# fileA, fileBが作成(touch)される
echo "fileA fileB" | xargs touch
```

## nl

```
# 空行に番号振らない
nl file.txt
cat -n file.txt

# 空行に番号振る
nl -b a file.txt
cat -b file.txt
```

## 標準出力を標準エラー出力にリダイレクト

```
echo "Error Message" 1>&2
```

## ブレーズ展開

```
cat {a,b,c}

cp log{,.bk}
```

