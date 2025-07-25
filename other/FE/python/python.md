# python

1991年にオランダ人のグイド・ヴァンロッサムさんによって開発され、オープンソースで運営されているプログラミング言語。

空飛ぶモンティ・パイソンが名前の由来らしい。

少ないコードで簡潔にプログラムを書け、専門的なライブラリが豊富にあるのが特徴。(大人気)

機械学習・人口知能、データ分析・Webアプリ開発などさまざまな分野で使用されている。

---

# 型(データ型)

| 型    | 例        | 説明           |
|-------|-----------|----------------|
| int   | 28        | 整数           |
| float | 3.14      | 小数(実数)     |
| str   | "john"    | 文字列         |
| bool  | True      | 真偽値(真or偽) |
| list  | [1, 2, 3] | 配列(リスト)   |

Pythonでは型を宣言しなくても自動で認識してくれる。(動的型付け)

# 変数

```
# 文字列
name = "john"
print(name + " is super dog")
```

# 配列(Pythonではリストと呼ぶ)

```
scores = [70, 85, 90]   # intのリスト
names = ["A", "B", "C"] # strのリスト
```

### 要素の取り出し(インデックス)

```
nums = [1, 2, 3]
print(nums[0]) # 1 (インデックスは0から始まる)
print(nums[1]) # 2
print(nums[2]) # 3
print(nums[3]) # エラーになる
```

### 要素の変更・追加・削除

```
nums[1] = 22   # 2 => 22 に変更
nums.append(4) # 末尾に追加
nums.pop(1)    # インデックス1を削除
```

# if

- `if`のあとに条件式
- `:`を忘れない
- `elif`(else ifの略)で複数条件を分ける
- `else`条件式が偽のときの処理
- インデント(字下げ)でif文を判断するので、fiやendifみたいなのはいらない

```
x = 10

if x <= 0:
  print("マイナス")
elif x <= 100:
  print("100以下の整数")
else:
  print("100以上")
```

# for

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

