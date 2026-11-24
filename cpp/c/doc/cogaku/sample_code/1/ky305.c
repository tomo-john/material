// ポインタが示すデータを表示

#include <stdio.h>

void main(void);

void main(void){
  char sz1[50] = {'J', 'o', 'h', 'n', '1', '\0'};

  char *p1 = "John2";

  printf("%s\n", sz1);

  printf("%s\n", p1);
}
