# 正の整数(10進数)を2進数に変換

decimal = 255
binary = 2
quotient = decimal // binary
remainder = decimal % binary

result = []
result.insert(0, remainder)

while quotient > 0:
  decimal = quotient
  quotient = decimal // binary
  remainder = decimal % binary
  result.insert(0, remainder)

print(result)

