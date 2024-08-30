#include <stdio.h>

int main(){
  char *p1;
  p1 = "ABCDEF";

  printf("p1: %s\n", p1);
  printf("*p1(%%p): %p\n", (void*)p1);
  printf("*p1(%%c): %c\n", *p1);

  return 0;
}
