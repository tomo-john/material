// 入力された数字を10, 16, 8進数で表示

#include <stdio.h>

int main(void){
  int ni;

  printf("数値を入力してください: ");
  scanf("%d", &ni);

  printf("10進数: %d\n", ni);
  printf("16進数: %x\n", ni);
  printf("8進数: %o\n", ni);
}
