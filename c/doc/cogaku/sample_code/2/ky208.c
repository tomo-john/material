// extern変数
#include <stdio.h>

int nG1;

void Function(void);

int main(){
  extern int nG2;

  nG1 = 10;
  nG2 = 20;

  printf("nG1: %d\n", nG1);
  printf("nG2: %d\n", nG2);

  Function();

  printf("nG1: %d\n", nG1);
  printf("nG2: %d\n", nG2);
}

int nG2;

void Function(void){
  nG1 = 100;
  nG2 = 200;

  printf("nG1(F): %d\n", nG1);
  printf("nG2(F): %d\n", nG2);

  nG1 = 1000;
  nG2 = 2000;
}
