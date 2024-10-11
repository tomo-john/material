// goto
#include <stdio.h>

int main(){
  int n1;

  datain: // 識別子ラベル名

  printf("0-9を入力: ");
  scanf("%d", &n1);

  if(n1 < 0 || n1 > 9)
    goto datain;

  printf("じょんが%d匹います\n", n1);
}
