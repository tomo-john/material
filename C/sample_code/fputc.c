#include <stdio.h>

int main(){
  FILE *fp;

  fp = fopen("output.txt", "w");

  if(fp == NULL){
    printf("ファイルオープン失敗\n");
    return 1;
  }

  fputc('j', fp);
  fputc('o', fp);
  fputc('h', fp);
  fputc('n', fp);

  fclose(fp);
  return 0;
}
