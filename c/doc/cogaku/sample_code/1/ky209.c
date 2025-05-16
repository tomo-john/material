// 足し算
#include <stdio.h>

int main(void){
  int n1, n2, n3;

  printf("加算元の数字を入力してください: ");
  scanf("%d", &n1);
  
  printf("加算する数字を入力してください: ");
  scanf("%d", &n2);

  n3 = n1 + n2;

  printf("%d + %d = %d です\n", n1, n2, n3);
}
