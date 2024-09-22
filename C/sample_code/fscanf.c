#include <stdio.h>

int main(){
  FILE *fp;
  char name[20];
  int age;

  fp = fopen("data.txt", "r");

  if(fp == NULL){
    printf("ファイルオープン失敗\n");
    return 1;
  }

  fscanf(fp, "%s %d", name, &age);

  printf("name: %s, age: %d\n", name, age);

  fclose(fp);

  return 0;
}
