// ポインタを移動して表示
#include <stdio.h>

int main(){
  char sz1[] = "ABCDEF";
  char *p1;
  int n1;

  p1 = sz1;

  printf("何番目の文字から表示しますか？(1~6): ");
  scanf("%d", &n1);

  p1 += n1 -1; // ポインタの移動
  printf("(%d文字目から表示): %s\n", n1, p1); // DEF(4を入力)
}
