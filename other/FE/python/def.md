# 関数(def)

## 定義(作る)

`def`キーワードを使う。

```
# greet という名前の関数を定義
def greet():
  print("こんにちワン")
```

- `def`: Functionの定義(Definition)を始める
- `greet`: 関数に付ける名前
- `()`: 関数の引数を記述する場所
- `:`: 定義の終わりを示すコロン
- インデントされたブロック: 関数が実行する処理

## 呼び出し(使う)

定義した関数は、その名前と`()`を使って呼び出す。

```
# 関数が呼び出されて処理が実行される
greet()

# 何度でも呼び出せる
greet()
```

## 引数

引数はデータを受け取る。

```
# name という引数を受け取る関数(定義)
def greet_person(name):
  print(f"こんにちワン、{name}さん")

# 呼び出し時に引数を渡す
greet_person("じょん") # こんにちは、じょんさん と表示される
```

## 戻り値

関数が処理を終えた後、その結果を呼び出し元に返すために`return`を使う。

```
# 受け取った2つの関数の合計を返す関数
def add_number(a, b):
  result = a + b
  return result # result の値を呼び出し元に返す

# 関数を呼び出し、戻り値を変数に格納する
sum_result = add_number(2, 8)
print(sum_result) # 10
```

### サンプル

```
def calculate_human_age(dog_age):
  human_age = 0
  
  if dog_age < 7:
    human_age = dog_age * 5
  else:
    human_age = dog_age * 4

  return human_age

human_age_9 = calculate_human_age(9)
human_age_5 = calculate_human_age(5)

print(f"9歳の犬は人間だと{human_age_9}歳です。")
print(f"5歳の犬は人間だと{human_age_5}歳です。")
```

