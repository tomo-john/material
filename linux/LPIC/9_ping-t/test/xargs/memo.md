# xargs

xargsコマンドの標準入力に文字列を渡すと、xargsコマンドで指定したコマンドがそれらの文字列を引数として実行される。

`--verbose`オプションで実際に実行されるコマンドを表示させる

```
cat test.txt | xargs --verbose touch
```

