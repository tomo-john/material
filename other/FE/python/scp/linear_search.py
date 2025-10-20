# 線形探索法(リニアサーチ)

def linear_search(arr,target):
  for i in range(len(arr)):
    if arr[i] == target:
      return i
  return -1

data = [2, 4, 6, 8, 10, 12]
target = 8

result = linear_search(data, target)

print("配列は:", data)
print("ターゲットは:", target)

if result == -1:
  print("見つかりませんでした: ")
else:
  print("ターゲットの値は、配列の", result, "番目にあります。")

