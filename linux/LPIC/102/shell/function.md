# function

functionコマンド(bashの組み込み)は、bashシェル上で利用できる独自の関数を定義することができる。

=> 頻繁に利用するコマンドの組み合わせを定義しておくと便利

```
[function] 関数名() { コマンド; }
```

```
function dog() { find . -name "*dog*" | grep 'john'; }
```

=> `{}`内のコマンドの前後にはスペースが必要

=> コマンドの最後に`;`をつける

=> `function`は省略可能

```
# シェルスクリプトで使用される書式
function                              # 省略可能
dog()                                 # 関数名
{
  find . -name "*dog*" | grep 'john'  # 最後に;いらない
}
```

=> この書式ではコマンドの末尾の`;`は不要

関数内のコマンドでは引数を使用することも可能。(`$1`, `$2`...)

関数を実行するにはコマンドと同じように、設定した関数名を入力。

関数が利用できるのは、その関数を定義したシェル内のみ。

`set`コマンド(引数なし)を実行すると、設定されている変数に続いて定義されている関数一覧が表示される。

=> 変数名と関数名は`重複してはいけない`

定義されている関数のみを表示するには`declare -f`コマンドで可能。

関数定義を削除する場合は、`unset`コマンドを使用する。(変数の削除と同じ)

