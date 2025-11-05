# switch文

たくさんの条件分岐を扱うときに便利な構文。

`if / else`など増えすぎるときにスッキリ書ける。

```
<?php
$color = "赤";

switch ($color) {
  case "赤":
    echo "赤は止まれ";
    break;

  case "黄":
    echo "黄は注意";
    break;

  case "青":
    echo "青は進んでよし";
    break;

  default:
    echo "信号にない色ですね";
    break;
}
```

- `case` : 各条件を指定する(`:`忘れない)
- `break` : 一致したら分岐を抜ける(忘れると次のcaseも実行される)
- `default` : どのcaseにも当てはまらなかった場合に実行される

