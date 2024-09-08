// static変数
#include <stdio.h>

void Function(void);

int main(){
  Function();
  Function();
  Function();
}

void Function(void){
  static int n1 = 0;

  n1 += 10;

  printf("n1: %d\n", n1);
}
