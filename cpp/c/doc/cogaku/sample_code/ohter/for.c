#include <stdio.h>

int main(){
  int n1[10];
  int ni;

  for(ni = 0; ni < 10; ni++){
    n1[ni] = 0;
  }

	for(ni = 0; ni < 10; ni++){
    printf("n1[%d] = %d\n", ni, n1[ni]);
  }
}
