// for
#include <stdio.h>

int main(){
  int n1, n2[5], nt;

  for(n1 =0; n1 < 5; n1++){
    printf("%d/5回目: 0-100を入力: ", n1+1);
    scanf("%d", &n2[n1]);
  }

  for(n1 = 0, nt = 0; n1 < 5; n1++){
    nt += n2[n1];
  }

  printf("入力された値の合計: %d\n", nt);
}
