// fgetc
#include <stdio.h>

int main(){
  FILE *fp;
  char szfname[] = "ky102.c";
  int ndata;

  fp = fopen(szfname, "r");
  if(fp == NULL){
    printf("ファイルのオープン失敗\n");
    return 1;
  }

  while(1){
    ndata = fgetc(fp);
    if(ndata == EOF)
      break;
    printf("%c", (char)ndata);
  }

  fclose(fp);
}
