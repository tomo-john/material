// テスト用
#include <stdio.h>

int main(void){
  int a = 10;  // aという変数を作成し、10を代入
  int *p = &a; // ポインタpにaのアドレスを代入

  printf("%d\n", a);  // 10
  printf("%p\n", &a); // 0x7ffeb3a82f5c : aのアドレス
  printf("%p\n", p);  // 0x7ffeb3a82f5c : pに格納されたアドレス(aのアドレス)
  printf("%d\n", *p); // 10 : pが指している値 = aの値
}
