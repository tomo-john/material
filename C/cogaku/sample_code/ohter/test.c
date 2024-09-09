#include <stdio.h>

int function(int n);

int main(){
  int n1;
  int n2;
  n1 = 1;

  n2 = function(n1);

  printf("n2: %d\n", n2);
}

int function(int n){
  n += 1;
  return n;
}
