// return
#include <stdio.h>

int Data_in(void);

int main(){
  int n1;

  n1 = Data_in();

  printf("入力された数: %d\n", n1);
}

int Data_in(void){
  int n1;

  printf("0-9を入力:");
  scanf("%d", &n1);
  if(n1 < 0 || n1 > 9)
    return -1;
  return n1;
}
