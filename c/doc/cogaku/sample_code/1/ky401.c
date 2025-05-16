// 2次元配列
#include <stdio.h>

void main(void);

void main(void){
  int n1[2][2] = {{1, 2}, {3, 4}};
  int n2;

  printf("何番目の行の配列を確認しますか？(1or2): ");
  scanf("%d", &n2);

  printf("%d の行の配列の内容は、 %d, %d です\n",
      n2, n1[n2-1][0], n1[n2-1][1]);
}
