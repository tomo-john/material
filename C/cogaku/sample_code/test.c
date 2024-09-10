#include <stdio.h>

int main(){
  int n1;
  printf("数値を入力して下さい: ");
  scanf("%d", &n1);

  if(n1 % 2 == 0)
    printf("入力された数値 %d は偶数です\n", n1);
  else
    printf("入力された数値 %d は奇数です\n", n1);
}
