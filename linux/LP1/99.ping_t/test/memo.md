```
# xaargs
cat file.txt | xargs touch
echo "fileA fileB" | xargs touch

# 標準出力を標準エラー出力にリダイレクト
echo "Error Message" 1>&2

# 空行に番号振らない
nl file.txt
cat -n file.txt

# 空行にも番号振る
nl -b a file.txt
cat -b file.txt
```

