#include <stdio.h>

int function(int n);

int main(){
  int n1;
  int n2;

  printf("数値を入力: ");
  scanf("%d", &n1);

  n2 = function(n1);

  printf("n2: %d\n", n2);
}

int function(int n){
  n *= n ;
  return n;
}
