# memo

## ありえない選択肢

- 変数の宣言だけ行い、変数に値を格納・取り出しがない
- 変数に値を格納する前に変数から値を取り出す
- 無限ループ

## 当てはめ法

```
floor(13, 6)は12を返す

整数型: floor(整数型: tNum, 整数型: sNum)
整数型: work
work = 0
while (work ≦ tNum)
  work = work + sNum
endwhile
work = ?????
return work
```

=> `?????`に当てはまるものを考える

- work x sNum
- work + sNum
- sNum - work
- work - sNum

実行前の例`floor(13, 6)`を当てはめると、`tNum = 13, sNum = 6`

| トレース            | 条件式   | tNum | sNum | work |
|---------------------|----------|------|------|------|
| 整数型: floor       |          | 13   | 6    |      |
| 整数型: work        |          |      |      |      |
| work = 0            |          |      |      | 0    |
| while(work ≦ tNum) | 0≦13 T  |      |      |      |
| work = work + sNum  |          |      |      | 6    |
| while...            | 6≦13 T  |      |      |      |
| work=...            |          |      |      | 12   |
| while...            | 12≦13 T |      |      |      |
| work=...            |          |      |      | 18   |
| while...            | 18≦13 F |      |      |      |
| work = ?????        |          |      |      | 12   |

選択肢を当てはめる:

- work x sNum => 18 x 6 = 108 : F
- work + sNum => 18 + 6 = 24 : F
- sNum - work => 6 - 18 = -12 : F
- work - sNum => 18 - 6 = 12 : OK

