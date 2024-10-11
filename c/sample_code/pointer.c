// ポインタ
#include <stdio.h>

int main(){
  int n = 28;
  int *p = &n;
  printf("nの値: %d\n", n);
  printf("nのアドレス: %p\n", p);
  printf("pが示す値: %d\n", *p);
  return 0;
}
