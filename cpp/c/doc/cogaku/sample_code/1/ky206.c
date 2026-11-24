// 入力された文字に数値を加算=>結果を文字表示

#include <stdio.h>

int main(void){
  char c1;
  int n1;

  printf("1文字入力してください: ");
  scanf("%c", &c1);

  printf("加算する数字を入力してください: ");
  scanf("%d", &n1);

  printf("文字(%c) + 数値(%d) = %c\n", c1, n1, c1+n1);
}
