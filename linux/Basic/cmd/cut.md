### cut
ファイルの指定したフィールドのみを取り出す

```
cut [オプション] [ファイル名]

# オプション①
-d : フィールド区切り文字を指定
-f : 取り出すフィールドを指定

cut -d: -f1,3 /etc/passwd


# オプション②
-b : バイト単位で切り出す
-c : 文字単位で切り出す

echo "Hello John" | cut -b 1-5  # => Hello

echo "Hello John" | cut -c 7-11 # => John

```

