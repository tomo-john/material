# バイナリサーチ(2分探索法)

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

