#include <stdio.h>

int main() {
  char name[50];

  printf("名前を入力して下さい: ");
  scanf("%49s", name);

  printf("こんにちは! %s さん!!\n", name);

  return 0;
}
