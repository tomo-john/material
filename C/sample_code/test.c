// テスト用
#include <stdio.h>

void changeValue(int *p){
  *p = 28;
}

int main(){
  int n = 10;
  printf("変更前のnの値: %d\n", n);

  changeValue(&n);
  printf("変更後のnの値: %d\n", n);

  return 0;
}
