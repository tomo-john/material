// ポインタの配列
#include <stdio.h>

int main(){
  char sz1[] = "ABCDEF";
  char sz2[] = "UVWXYZ";
  char *p1[2];
  int n1;

  p1[0] = sz1;
  p1[1] = sz2;

  printf("0か1を入力してください: ");
  scanf("%d", &n1);

  printf("%s\n", p1[n1]);
}
