/* 文字定数を表示*/

#include <stdio.h>

int main(void){
  char c1, c2, c3, c4;
  c1 = 0x41;
  c2 = 'A';
  c3 = '\t';
  c4 = '\\';

  printf("0x41: %c\n", c1);
  printf("A: %c\n", c2);
  printf("TABの動作: %c<TAB>\n", c3);
  printf("\\記号の表示: %c\n", c4);
}
