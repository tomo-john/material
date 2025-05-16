// 型変換
#include <stdio.h>

int main(void){
  char c1;
  long l1;
  float f1;

  c1 = 100;
  l1 = c1;
  printf("%d (char) から %ld (long) \n", c1, l1);

  l1 = 256;
  c1 = (char) l1;
  printf("%ld (long) から %d (char) \n", l1, c1);

  f1 = 123.456F;
  l1 = (long) f1;
  printf("%f (float) から %ld (long) \n", f1, l1);
}
