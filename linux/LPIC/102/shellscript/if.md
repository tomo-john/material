# if文

条件によって処理を選択する。

```
if 条件式
then
  実行文1 # 条件式が真の場合に実行
else
  実行文2 # 条件式が偽の場合に実行
fi
```

```
if test -f dogfile  # dogfileが(ファイルで)存在すれば真
then
  source ./dogfile            
else
  echo "dogfileがありません!"
fi
```

### 書き換え(これでもOK)

```
if [ -f dogfile ] ; then
  . ./dogfile
else
  echo "dogfileがありません!"
fi
```

- testコマンドを`[]`
- sourceコマンドを`.`
- `;`で複数のコマンドを1行に

## 条件式

条件式の部分は`test([])`コマンドに限らず、通常コマンドでも指定が可能。

コマンドが正常に実行され、戻り値が`0`であれば真とみなす。

```
if touch dogfile ; then
  echo "dogfileを作成しました"
else
  echo "dogfileの作成に失敗しました"
fi
```

## elif

条件1を満たさなかったときに条件2...みたいなやつ。

条件かさねすぎると訳が分からなくなりやすいので注意。

```
if [ "$age" -lt 2 ]; then    # 2未満 
  echo "まだ子犬だね"
elif [ "$age" -le 10 ]; then # 10以下
  echo "まだ若い犬だね"
else
  echo "You are super dog!"  # 10より大きい(上の2つの条件をどちらも満たさない)
fi
```

