/* 数値定数を表示する */

#include <stdio.h>

int main(void){
  /* 変数定義 */
  int ni8, ni10, ni16;
  float fe, f;

  /* 定数を変数にセット */
  ni8 = 012;
  ni10 = 12;
  ni16 = 0x12;
  fe = 12e3;
  f = 1.23F;

  /* 変数の8, 10, 16進数で表示 */
  printf ("8進数: %d\n", ni8);
  printf ("10進数: %d\n", ni10);
  printf ("16進数: %d\n", ni16);
  printf ("指数: %f\n", fe);
  printf ("小数点: %f\n", f);
}
