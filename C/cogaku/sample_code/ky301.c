// if
#include <stdio.h>

int main(){
  int n1;

  printf("数値を入力: ");
  scanf("%d", &n1);

  if (n1 % 2 == 0)
    printf("%d は偶数です\n", n1);
  else
    printf("%d は奇数です\n", n1);
}
