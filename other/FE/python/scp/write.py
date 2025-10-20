# ファイル操作を行うためのライブラリをインポート
import os

# ファイルを書き込みモードで開く
with open("test.txt", "w", encoding="utf-8") as file:
  # ファイルにテキストを書き込む
  file.write("Hello, World!\n")
  file.write("John")
  print("ファイルに書き込みました。")

