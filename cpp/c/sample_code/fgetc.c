#include <stdio.h>

int main(){
  FILE *fp;
  int ch;

  fp = fopen("example.txt", "r");
  if(fp == NULL){
    printf("ファイルを開けません\n");
    return 1;
  }
  
  while((ch = fgetc(fp)) != EOF){
    putchar(ch);
  }

  fclose(fp);
  return 0;
}
