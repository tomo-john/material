// ポインタ変数を使用した代入
#include <stdio.h>

void main(void);

void main(void){
  int n1; int n2; int *p1;

  printf("数値を入力してください: ");
  scanf("%d", &n1);

  p1 = &n1; // p1にn1のアドレスを代入

  n2 = *p1; // p1が示すデータをn2に代入

  printf("入力した数値: %d\n", n1);       // 5(入力した数値)
  printf("ポインタのアドレス: %x\n", p1); // 6ddfb5fc
  printf("代入された数値: %d\n", n2);     // 5(入力した数値)
}
