#include <stdio.h>
#include <stdlib.h>  // atoi() を使うために必要

int main() {
  char str1[] = "1234";
  char str2[] = "56abc";
  char str3[] = "abc78";

  // 文字列を整数に変換
  int num1 = atoi(str1);
  int num2 = atoi(str2);
  int num3 = atoi(str3);

  // 結果を表示
  printf("str1 = \"%s\" -> num1 = %d\n", str1, num1);
  printf("str2 = \"%s\" -> num2 = %d\n", str2, num2);
  printf("str3 = \"%s\" -> num3 = %d\n", str3, num3);

  return 0;
}
