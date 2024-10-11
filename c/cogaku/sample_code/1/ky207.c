// 代入された数値を表示

#include <stdio.h>

int main(void){
  int n1, n2;

  n1 = 1;

  printf("現在の変数n1の内容: %d\n", n1);

  n1 = 2;

  printf("現在の変数n2の内容: %d\n", n1);

  printf("変数n2の値を入力してください: ");
  scanf("%d", &n2);

  printf("現在の変数n1の内容: %d\n", n1);
  printf("現在の変数n2の内容: %d\n", n2);

  printf("n1 = n2 を実施\n");
  n1 = n2;

  printf("現在の変数n1の内容: %d\n", n1);
  printf("現在の変数n2の内容: %d\n", n2);

}
