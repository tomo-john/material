// 累積値
#include <stdio.h>

int main(){
  int n;
  printf("数値を入力: ");
  scanf("%d", &n);
  int i;
  int sum = 0;

  for(i = 1; i <= n; i++){
    sum += i;
  }
  printf("1から%dの累積値は: %d\n", n, sum);
}
