// 合計値と平均値

#include <stdio.h>

int main() {

  int n = 0;

  printf("入力した数値の合計値と平均値を出力します。\n");
  printf("入力する数値の個数を入力して下さい: ");
  scanf("%d", &n);

  int sum = 0;
  float avg = 0.0;
  int i = 0;

  for (i = 1; i <= n; i = i + 1) {
    int tmp = 0;
    printf("%d個目の数値を入力して下さい: ", i);
    scanf("%d", &tmp);
    sum += tmp;
  }

  avg = (float)sum / n;

  printf("合計: %d\n", sum);
  printf("平均: %f\n", avg);

  return 0;

}
