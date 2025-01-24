# sed

sedコマンドはテキストを読み込みながら指定したルールに基づいて変換や加工を行うツール。

`stream editor(ストリームエディター)`の略。

## 基本構文

```
sed [オプション] 操作コマンド ファイル名
```

## よく使うやつ(置換)

```
echo -e "dog dog\ndog dog" | sed s/dog/john/
# john dog
# john dog
```

各行で最初にマッチした`dog`を`john`に置き換え。

`g`スイッチをつけると行内のすべてが置換される。

```
echo -e "dog dog\ndog dog" | sed s/dog/john/g
# john john
# john john
```

## よく使うやつ(削除)

```
# 2から5行目を削除
sed 2,5d file

# 2行目と5行目を削除
sed -e 2d -e 5d file
```

