// 入力値を逆順に出力(数値)

#include <stdio.h>

int main(){

  int n = 0;
  printf("数値を入力して下さい: ");
  scanf("%d", &n);  

  // 桁数を求める
  int digi = 0;
  int tmp = n;

  while (tmp > 0){
    tmp /= 10;
    digi += 1;
  }

  // printf("出力結果: %d\n", result);
  
  return 0;
}
