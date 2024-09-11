// do
#include <stdio.h>

int main(){
  char c1[80];

  do{
    printf("Yかyを入力しなさい: ");
    scanf("%s", c1);
  } while(c1[0] != 'Y' && c1[0] != 'y');

  printf("%cを入力してくれてありがとう\n", c1[0]);
}
