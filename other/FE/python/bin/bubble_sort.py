# バブルソート(基本交換法)

# 関数定義
def bubble_sort(arr):
  n = len(arr)
  for i in range(n - 1):                        # 外側のループ: 配列の要素数-1回まわす
    for j in range(n - 1 - i):                  # 内側のループ: 毎回比較回数が1ずつ減る
      if arr[j] > arr[j + 1]:                   # 隣り合う要素を比較
        arr[j], arr[j + 1] = arr[j + 1], arr[j] # 交換

# 実際に使ってみる
data = [2, 4, 5, 3, 1]
bubble_sort(data)
print(data)

