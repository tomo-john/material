# basename

指定されたパスから最後の部分(ファイル名やディレクトリ名)を抽出するコマンド。

拡張子を取り除くこともできる。

```
basename [オプション] パス [サフィックス]
```

```
basename /home/user/document/sample.txt
```

=> `sample.txt`と表示(パス名を除いたファイル名のみ出力される)

=> 最後に拡張子を指定すると、拡張子を取り除いて出力も可能

```
basename /home/user/document/sample.txt .txt
```

=> `sample`と表示

## 使用例

カレントディレクトリのファイル・ディレクトリ一覧を表示する。

```shell
#!/bin/bash
for file in "$(pwd)"/*; do
  filename=$(basename "$file")
  if [ -d "$file" ]; then
    echo "ディレクトリ名: $filename"
  elif [ -f "$file" ]; then
    echo "ファイル名: $filename"
  fi
done
```

---

# dirname

指定されたパスからディレクトリ部分だけを抽出するコマンド。

```
# dirnameの場合
dirname /home/tomo/test.txt # => /home/tomo

# basenameの場合
basename /home/tomo/test.txt # => test.txt
```

dirnameは`パスの最後のスラッシュ(/以降)を取り除く`動作をする。

```
dirname /home/tomo # => /home
```

### whichコマンドと合わせてコマンドのディレクトリ名部分だけを抽出

```
dirname $(which ls)
```

