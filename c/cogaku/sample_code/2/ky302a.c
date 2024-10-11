// switch
#include <stdio.h>

int main(){
  int n1;

  printf("0-9を入力: ");
  scanf("%d", &n1);

  switch(n1){
    case 0:
      printf("0john\n");
      break;
    case 1:
      printf("1john\n");
      break;
    case 2:
      printf("2john\n");
      break;
  }
}
