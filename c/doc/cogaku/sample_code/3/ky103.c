// fgets
#include <stdio.h>

int main(){
  FILE *fp;
  char szfname[] = "ky103.c";
  char szdata[81];

  fp = fopen(szfname, "r");
  if(fp == NULL){
    printf("ファイルオープンに失敗\n");
    return 1;
  }

  while(fgets(szdata, 81, fp) != NULL)
    printf("%s", szdata);

  fclose(fp);
}
