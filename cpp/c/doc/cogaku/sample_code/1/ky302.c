// アドレスを使ったサンプル
#include <stdio.h>

int main(void){
  char sz1[50] = {'H', 'e', 'l', 'l', 'o', '\0'};

  printf("%s\n", sz1);

  printf("%s\n", &sz1[3]);
}
