// 入力値を逆順に出力(数値)

#include <stdio.h>

int main(){

  int n, reverse = 0;
  printf("数値を入力して下さい: ");
  scanf("%d", &n);  

  int tmp = n;

  while (tmp > 0){
    int digit = tmp % 10;
    reverse = reverse * 10 + digit;
    tmp /= 10;
  }

  printf("出力結果: %d\n", reverse);
  
  return 0;
}
