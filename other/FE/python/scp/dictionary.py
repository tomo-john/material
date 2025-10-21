# 辞書の定義
my_dog_info = {
  "名前": "じょん",
  "犬種": "ゴールデンレトリバー",
  "レベル": 99,
  "おもちゃ": "ボール"
}

print(my_dog_info)

# 値の取り出し
print(my_dog_info["名前"])

# 新しいペアの追加
my_dog_info["好きな食べ物"] = "肉"
print(my_dog_info)

# 既存キーの値の更新
my_dog_info["レベル"] = 100
print(my_dog_info)

# 要素の削除
del my_dog_info["おもちゃ"]
print(my_dog_info)

