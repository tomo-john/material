// continue
#include <stdio.h>

int main(){
  int n1;

  for(n1 = 0; n1 < 10; n1++){
    if(n1 < 5)
      continue;
    printf("%d回目のループ\n", n1+1);
  }
}
