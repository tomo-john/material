//グローバル変数
#include <stdio.h>

int nG1; // グローバル関数宣言

void Function1(void);

int main(){
  nG1 = 1; // グローバル関数初期化

  printf("main関数のn1: %d\n", nG1);

  Function1();

  printf("main関数のn1: %d\n", nG1);
}

void Function1(void){
  nG1 = 2; // グローバル変数代入

  printf("Function1のn1: %d\n", nG1);
}
