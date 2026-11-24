// 引数にアドレス
#include <stdio.h>

void Function1(int *);

int main(){
  int n1;
  n1 = 1;

  printf("main関数のn1: %d\n", n1);

  Function1(&n1);

  printf("main関数のn1: %d\n", n1);
}

void Function1(int *n1){
  *n1 = 2;

  printf("Function1関数のn1: %d\n", *n1);
}
