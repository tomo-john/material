// ポインタとアドレス
#include <stdio.h>

void main(void);

void main(void){
  char sz1[50] = {'L', 'i', 'n', 'u', 'x', '\0'};

  printf("%s\n", sz1);      // sz1の内容

  printf("%x\n", &sz1[0]);  // sz1の1番目のアドレス

  printf("%x\n", sz1);      // sz1のポインタ
}
