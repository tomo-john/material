// while
#include <stdio.h>

int main(){
  char c1[80];
  c1[0] = 0x00;

  while(c1[0] != 'Y' && c1[0] != 'y'){
    printf("Please Y or y: ");
    scanf("%s", c1);
  }

  printf("Thank you for %c!\n", c1[0]);
}
