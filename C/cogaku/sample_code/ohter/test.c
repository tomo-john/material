#include <stdio.h>

int main(){
  char c1;
  printf("英数字1文字を入力: ");
  scanf("%c", &c1);

  printf("入力された文字 %c の16進数のコードは 0x%02X\n", c1, c1);
}
