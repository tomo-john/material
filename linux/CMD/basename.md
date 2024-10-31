# basename
ディレクトリ名とファイル名を含むパス名からファイル名部分を抽出する

```
# basename パス名ファイル名 [サフィックス]
basename /home/user/document/sample.txt
```
`sample.txt`とパス名を除いたファイル名のみ出力される

最後に拡張子を指定すると、拡張子を取り除いて出力も可能

```
basename /home/user/document/sample.txt .txt # => sample と出力
```

# shellscriptの使用例

```shell
#!/bin/bash
for file in `pwd`/*; do
  filename=$(basename "$file")
  echo "ファイル名: $filename"
done
```

