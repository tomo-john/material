# for

重要なのはインデントとコロン :dog:

```
animals = ["dog", "bear", "rabbit"]

for animal in animals:
  print(animal)
```

```
# リストの合計を求める
nums = [1, 2, 3, 4, 5]
total = 0

for n in nums:
  total += n

print("合計:", total)
```

### range

for文と組み合わせると便利。

`for i in range(1, 5):`で1～4をループ。

=> 最後の5は含まれないので注意

補足:

- `range(5)` : 0, 1, 2, 3, 4
- `range(2, 8)` : 2, 3, 4, 5, 6, 7
- `range(1, 10, 2)` : 1, 3, 5, 7, 9(3番目の引数はステップ)

インデックス付きでリストを回したいとき:

```
animals = ["dog", "rabbit", "bear"]

for i in range(len(animals)):
  print(f"{i}番目は{animals[i]}")
```

