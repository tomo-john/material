#include <stdio.h>

int main(){
  int n1[] = {1, 2, 3};

  printf("%d\n", *n1);
  printf("%d\n", *(n1 + 1));
  printf("%d\n", *(n1 + 2));

  return 0;
}
