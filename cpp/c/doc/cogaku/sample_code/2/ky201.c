// 関数
#include <stdio.h>

int Func_plus(int, int);
void Func_disp(int);

int main(){
  int n1, n2, n3;

  printf("1番目の数値: ");
  scanf("%d", &n1);
  printf("2番目の数値: ");
  scanf("%d", &n2);

  n3 = Func_plus(n1, n2);

  Func_disp(n3);
}

int Func_plus(int n1, int n2){
  return n1 + n2;
}

void Func_disp(int n1){
  printf("\n2つの数値を加算すると %d です", n1);
}
