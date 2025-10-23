# コマンドライン引数
import sys

print(sys.argv)
print(sys.argv[0])
print(sys.argv[1])
print(sys.argv[2])

result = sys.argv[1] + sys.argv[2]
print(f"引数1 + 引数2 = {result}")

