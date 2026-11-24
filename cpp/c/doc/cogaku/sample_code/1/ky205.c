// 入力された文字を16進数、10進数で表示

#include <stdio.h>

int main(void){
  char c1;

  printf("1文字入力してください: ");
  scanf("%c", &c1);

  printf("%c (%x) = %d\n", c1, c1, c1);
}
