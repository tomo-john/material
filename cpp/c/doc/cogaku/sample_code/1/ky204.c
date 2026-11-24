// 入力された浮動小数点数値を表示

#include <stdio.h>

int main(void){
  float fi1, fi2;

  printf("小数点値を入力してください(その1): ");
  scanf("%f", &fi1);

  printf("小数点値を入力してください(その2): ");
  scanf("%f", &fi2);

  printf("%.10f + %.10f = %.10f\n", fi1, fi2, fi1+fi2);
}
