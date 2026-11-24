// 共用体
#include <stdio.h>

int main(){
  union Dog{
    char name1[20];
    char name2[10];
    char name3[2];
  };

  union Dog undog = {"superdogjhoon"};

  printf("name1: %.20s\n", undog.name1);
  printf("name2: %.10s\n", undog.name2);
  printf("name3: %.2s\n", undog.name3);
}
