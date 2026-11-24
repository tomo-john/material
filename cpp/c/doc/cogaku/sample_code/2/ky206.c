// auto変数
#include <stdio.h>

void Function1(void);

int main(){
  int n1;
  auto int n2;

  n1 = 10;
  n2 = 20;

  Function1();

  printf("n1: %d\n", n1);
  printf("n2: %d\n", n2);
}

void Function1(void){
  int n1 = 10;
  auto int n2 = 20;

  n1 = 100;
  n2 = 200;

  printf("n1(F): %d\n", n1);
  printf("n3(F): %d\n", n2);
}
