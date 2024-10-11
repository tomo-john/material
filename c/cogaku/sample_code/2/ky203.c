// ローカル変数
#include <stdio.h>

void Function1(void);

int main(){
  int n1;
  n1 = 1;

  printf("main関数のn1: %d\n", n1);

  Function1();

  printf("main関数のn1: %d\n", n1);
}

void Function1(void){
  int n1;
  n1 = 2;

  printf("Function1関数のn1: %d\n", n1);
}
