# 犬クラスを作ってみよう

class Dog:
  def __init__(self, name):
    self.name = name

  def bark(self):
    print(self.name + " : ワンワン!")

# インスタンス化(実体化)
john_dog = Dog("じょん")
john_dog.bark() # じょん : ワンワン!


# もう1匹
super_dog = Dog("スーパーサイヤジョーン2")
super_dog.bark()

