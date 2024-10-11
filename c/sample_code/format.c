// テスト用
#include <stdio.h>

int main(void){
  printf("[%d]\n", 28);              // [28]
  printf("[%5d]\n", 28);             // [   28] => 最小5桁

  printf("[%s]\n", "Hello John!");   // [Hello John!]
  printf("[%15s]\n", "Hello John!"); // [    Hello John!] => 最小15桁
  printf("[%.5s]\n", "Hello John!"); // [Hello] => 最大5桁

  printf("[%f]\n", 123.45678);       // [123.456780]
  printf("[%8.3f]\n", 123.45678);    // [ 123.457]

  printf("%s\n", "-----------------------------------------------------------------------------------");

  /* unsigned は符号なしの整数 */
  unsigned int a = 0b1101; // 10進数の13
  unsigned int b = 0b1011; // 10進数の11

  printf("a: %08d\n", a);
  printf("b: %08d\n", b);

  printf("a & b  = %08d\n", a & b);
  printf("a | b  = %08d\n", a | b);
  printf("a ^ b  = %08d\n", a ^ b);
  printf("~a     = %08d\n", ~a);
  printf("a << 1 = %08d\n", a << 1);
  printf("a >> 1 = %08d\n", a >> 1);
}
