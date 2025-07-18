sum = 0

for i in range(1, 6):
  for j in range(1, i+1):
    if (i + j) % 2 ==0:
      sum = sum + (i * j)

print(sum)

animals = ["dog", "rabbit", "bear"]

for i in range(len(animals)):
  print(f"{i}番目は{animals[i]}")

