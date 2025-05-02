# case文

式の値に応じて複数に分岐する場合に便利。

```
case 式 in
  値1)
    実行文1 ;;
  値2)
    実行文2 ;;
  # 以下同じようにつづけて書ける

  *) # どれにもマッチしない場合の処理
    実行文 ;;
esac
```
- 最初の式の後に`in`を忘れない
- 実行文の末尾に`;;`をつけること
- case式の最後に`esac`と指定すること => `esac`は`case`を逆にしただけ
- `*)`ではどれにもマッチしない場合の処理

```
case $1 in
  1) echo one ;;
  2) echo two ;;
  3) echo three dogs ;;
  *) echo please choice 1 2 3 ;;
esac
```

