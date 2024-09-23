#include <stdio.h>

int main(){
  FILE *fp;

  fp = fopen("output.txt", "w");
  if(fp == NULL){
    printf("ファイルオープン失敗");
    return 1;
  }

  fputs("Hello John!\n", fp);

  fclose(fp);
  return 0;
}
