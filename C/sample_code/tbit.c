// ビット演算
#include <stdio.h>

int main(){
  /* unsigned は符号なしの整数 */
  unsigned int a = 0b1101; // 10進数の13
  unsigned int b = 0b1011; // 10進数の11

  printf("a & b  = %x\n", a & b);
  printf("a | b  = %x\n", a | b);
  printf("a ^ b  = %x\n", a ^ b);
  printf("~a     = %x\n", ~a);
  printf("a << 1 = %x\n", a << 1);
  printf("a >> 1 = %x\n", a >> 1);
}
