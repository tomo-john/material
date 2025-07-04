# 2分探索法(バイナリサーチ)

整列されたデータの中から、目的の値を効率よいう探す方法。

- データは前もって並び替え(昇順・降順)の必要あり
- 線形探索(1つずつ見ていくやり方)より速く探せる
- 探す範囲が毎回半分になる => `計算量は O(log₂N)`

### 仕組み

- 1 : 中央の値を調べる
- 2 : 調べた値が
  - 探したい値より小さければ右半分を見る
  - 探したい値より大きければ左半分を見る
- 3 : これを繰り返す

### サンプルコード(python)

```
# 関数定義
def binary_search(arr,target):
  left = 0
  right = len(arr) -1

  while left <= right:
    mid = (left + right) // 2
    if arr[mid] == target:
      return mid
    elif arr[mid] < target:
      left = mid + 1
    else:
      right = mid -1

  return -1

# テスト用データ
data = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
key = 1

# 関数呼び出し
index = binary_search(data,key)
print(index)
```

