#include <stdio.h>

struct Animal {
  char type;
  union {
    int dogAge;
    int rabbitAge;
  } info;
};

int main() {
  struct Animal myPet;

  // dogを設定
  myPet.type = 'd';
  myPet.info.dogAge = 2;
  printf("Animal type: %c, Age: %d\n", myPet.type, myPet.info.dogAge);

  // 同じメモリ領域を使用してrabbitを設定
  myPet.type = 'r';
  myPet.info.rabbitAge = 10;
  printf("Animal type: %c, Age: %d\n", myPet.type, myPet.info.rabbitAge);

  return 0;
}

