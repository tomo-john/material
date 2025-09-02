# 基本
print("Hello, Python!")

# 変数
name = "john"
print("Hello", name)

# +
name = "じょん"
print("こんにちは" + name + "さん!")

# f文字列
age = 10
print(f"じょんは{age}歳です。")

# カンマ区切り
a = 1
b = 2
print("aの値は", a, "で、bの値は", b)

# 改行せずに出力
print("Hello", end=" ")
print("World")

# 改行
print("1行目\n2行目")

# タブ区切り
print("A\tB\tC")

# 小数点の桁数を指定(2桁)
pi = 3.141592
print(f"円周率は {pi:.2f} です")

# 文字列と数値つなぐ
age = 11
print("じょんは来年、" + str(age) + "歳です")

# データ型の確認
print(type("Python"))
print(type(123))

